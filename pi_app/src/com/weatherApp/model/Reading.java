package com.weatherApp.model;

import java.util.HashMap;

public class Reading {

    private String id;
    private String name;
    private String country;
    private String latitude;
    private String longitude;
    private String elevation;

    private HashMap<String, Float> data;

    public Reading(Station station) {
        this.id = station.getStn();
        this.name = station.getName();
        this.country = station.getCountry();
        this.latitude = station.getLatitude();
        this.longitude = station.getLongitude();
        this.elevation = station.getElevation();

        data = new HashMap<>();

        station.getMeasurements().forEach(measurement -> {
            for (String key : measurement.getData().keySet()) {
                if (!data.containsKey(key)) {
                    data.put(key, 0f);
                }

                if (key.equals("FRSHTT")) {
                    data.put(key, measurement.getData().get(key));
                    continue;
                }

                data.put(key, data.get(key) + measurement.getData().get(key));
            }
        });

        for(String key : data.keySet()) {
            if (key.equals("FRSHTT")) {
                data.put(key, data.get(key));
                continue;
            }

            data.put(key, data.get(key) / station.getMeasurements().size());
        }
    }

}
