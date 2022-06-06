package com.ficticiusclean.spring.controller;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.Collections;
import java.util.Comparator;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.web.bind.annotation.RequestBody;

import com.ficticiusclean.spring.model.Car;
import com.ficticiusclean.spring.model.CarFactory;

@Service
public class CarService {
	@Autowired
	CarFactory repository;
	
	public Car registerCar(@RequestBody Car car){
		return repository.save(car);
	}
	
	public List<Car> getCars(){
		return repository.findAll();
	}
	
	public Car getCar(Long id){
		return repository.getReferenceById(id);
	}
	
	public void remCar(Long id){
		repository.deleteById(id);
	}

	@SuppressWarnings("deprecation")
	public Car[] spendingForecast(double gasolinePrice, double distanceCity, double distanceRoad){
		
		List<Car> carListRepo = repository.findAll();
		Car[] carListNotRanked = new Car[carListRepo.size()];
		
		Car tempCar;
		
		for(Car car : carListRepo) {
			
			 double priceGasolineForKmCity = gasolinePrice/car.getConsAvgCity();
			 double priceForDistanceCity = priceGasolineForKmCity*distanceCity;
			 double spendingGasolineCity = priceForDistanceCity/gasolinePrice;
			 
			 double priceGasolineForKmRoad = gasolinePrice/car.getConsAvgRoad();
			 double priceForDistanceRoad = priceGasolineForKmRoad*distanceRoad;
			 double spendingGasolineRoad = priceForDistanceRoad/gasolinePrice;
			 
			 double totalSpending = priceForDistanceCity+priceForDistanceRoad;
			 double totalGasolineSpending = spendingGasolineRoad+spendingGasolineCity;
			 
			 tempCar = new Car();
			 tempCar.setName(car.getName());
			 tempCar.setBrand(car.getBrand());
			 tempCar.setModel(car.getModel());
			 tempCar.setYear((car.getDateFab().getYear()+1900));
			 tempCar.setTotalSpending(totalSpending);
			 tempCar.setTotalGasolineSpending(totalGasolineSpending);
			
			 carListNotRanked[carListRepo.indexOf(car)] = tempCar;
			 
		}
		
		
		for(int i=0; i<carListNotRanked.length;i++) {
			Car carAux;
			if(carListNotRanked.length>0 &&  carListNotRanked[i+1].geTotalGasolineSpending()<carListNotRanked[i].geTotalGasolineSpending()) {
				carAux = carListNotRanked[i];
				carListNotRanked[i] = carListNotRanked[i+1];
				carListNotRanked[i+1] = carAux;
			}
		
		}
		
		return carListNotRanked; 
	}
	
}
