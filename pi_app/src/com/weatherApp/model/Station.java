package com.weatherApp.model;

import java.util.ArrayList;
import java.util.Collections;
import java.util.List;

public class Station {

    public static final int MAX_MEASUREMENTS = 30;

    private String stn;
    private String name;
    private String country;
    private String latitude;
    private String longitude;
    private String elevation;

    private int totalMeasurementsAdded = 0;

    private List<WeatherMeasurement> measurements;

    public Station() {
        measurements = Collections.synchronizedList(new ArrayList<>());
    }

    public void addMeasurement(WeatherMeasurement measurement) {
        this.measurements.add(measurement);

        if (this.measurements.size() > MAX_MEASUREMENTS) {
            this.measurements.remove(0);
        }

        this.totalMeasurementsAdded++;
    }

    public List<WeatherMeasurement> getMeasurements() {
        return measurements;
    }

    public int getTotalMeasurementsAdded() {
        return totalMeasurementsAdded;
    }

    public String getStn() {
        return stn;
    }

    public void setStn(String stn) {
        this.stn = stn;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getCountry() {
        return country;
    }

    public void setCountry(String country) {
        this.country = country;
    }

    public String getLatitude() {
        return latitude;
    }

    public void setLatitude(String latitude) {
        this.latitude = latitude;
    }

    public String getLongitude() {
        return longitude;
    }

    public void setLongitude(String longitude) {
        this.longitude = longitude;
    }

    public String getElevation() {
        return elevation;
    }

    public void setElevation(String elevation) {
        this.elevation = elevation;
    }
}
