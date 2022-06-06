package com.ficticiusclean.spring.model;

import java.util.Date;
import javax.persistence.*;

import lombok.*;

@Entity
@Data
@AllArgsConstructor
@NoArgsConstructor
public class Car implements Comparable<Car>{
	
	@Id
	@GeneratedValue(strategy = GenerationType.AUTO)
	private Long id;
	
	private String name;
	private String brand;
	private String model;
	private Date dateFab;
	private double consAvgCity, consAvgRoad;
	
	private int yearFab;
	private double totalSpend;
	private double totalGasSpend;
	
	
	public double geTotalGasolineSpending() {
		return this.totalGasSpend;
	}
	
	public void setTotalGasolineSpending(double totalGasolineSpending) {
		this.totalGasSpend = totalGasolineSpending;
	}
	
	public void setTotalSpending(double totalSpending) {
		this.totalSpend = totalSpending;
	}
	
	public double getTotalSpending() {
		return this.totalSpend;
	}
	
	public void setYear(int year) {
		this.yearFab = year;
	}
	
	public int getYear() {
		return this.yearFab;
	}
	
	public Long getId() {
		return this.id;
	}
	
	public void setName(String nome) {
		this.name = nome;
	}
	
	public void setBrand(String marca) {
		this.brand = marca;
	}
	
	public void setModel(String modelo) {
		this.model = modelo;
	}
	
	public void setDateFab(Date dataFab) {
		this.dateFab = dataFab;
	}
	
	public void setConsAvgCity(double consAvgCity) {
		this.consAvgCity = consAvgCity;
	}
	
	public void setConsAvgRoad(double consAvgRoad) {
		this.consAvgRoad = consAvgRoad;
	}
	
	public String getName() {
		return this.name;
	}
	
	public String getBrand() {
		return this.brand;
	}
	
	public String getModel() {
		return this.model;
	}
	
	public Date getDateFab() {
		return this.dateFab;
	}
	
	public double getConsAvgCity() {
		return this.consAvgCity;
	}
	
	public double getConsAvgRoad() {
		return this.consAvgRoad;
	}

	@Override
	public int compareTo(Car car) {
		
		return 0;
	}
	
}
