package com.ficticiusclean.spring.rest;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseStatus;
import org.springframework.web.bind.annotation.RestController;

import com.fasterxml.jackson.annotation.JsonFormat;
import com.fasterxml.jackson.databind.jsonFormatVisitors.JsonFormatTypes;
import com.ficticiusclean.spring.controller.CarService;
import com.ficticiusclean.spring.model.Car;

import lombok.AllArgsConstructor;

@RestController
@AllArgsConstructor
@RequestMapping("/carros")
public class CarRest {
	
	@Autowired
	private CarService carService;
	
	@GetMapping("/buscar")
	@ResponseStatus(HttpStatus.OK)
	public List<Car> getCars(){
		return carService.getCars();
	}
	
	@GetMapping("/busca/{id}")
	@ResponseStatus(HttpStatus.FOUND)
	public Car getCar(@PathVariable Long id){
		return carService.getCar(id);
	}
	
	@DeleteMapping("/remover/{id}")
	@ResponseStatus(HttpStatus.NO_CONTENT)
	public void remCar(@PathVariable Long id){
		carService.remCar(id);
	}
	
	@PostMapping("/adicionar")
	@ResponseStatus(HttpStatus.CREATED)
	public Car registerCar(@RequestBody Car car){
		return carService.registerCar(car);
	}
	
	@PostMapping("/previsaoGastos")
	@ResponseStatus(HttpStatus.OK)
	@JsonFormat(shape=JsonFormat.Shape.OBJECT)
	public Car[] spendingForecast(@RequestBody double gasolinePrice, @RequestBody double distanceCity, @RequestBody double distanceRoad){
		return carService.spendingForecast(gasolinePrice, distanceCity, distanceRoad);
	}
	
}
