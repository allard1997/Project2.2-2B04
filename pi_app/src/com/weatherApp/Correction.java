package com.weatherApp;

import com.weatherApp.model.Station;
import com.weatherApp.model.WeatherMeasurement;

import java.util.HashMap;
import java.util.List;

public class Correction {

    private final static int MIN_MEASUREMENTS_ADDED = Station.MAX_MEASUREMENTS;
    private final static int TEMP_THRESHOLD = 5;

    public static void Correct(WeatherMeasurement measurement, Station station) {
        List<WeatherMeasurement> measurements = station.getMeasurements();
        HashMap<String, Float> data = measurement.getData();
        if (measurements.size() < Station.MAX_MEASUREMENTS) {
            for (String key : data.keySet()) {
                if (data.get(key) == null) {
                    if (station.getMeasurements().size() == 0) {
                        data.put(key, 0f);
                    } else {
                        double sum = measurements.stream().mapToDouble(m -> m.getData().get(key)).sum();
                        float average = (float) (sum / measurements.size());
                        data.put(key, average);
                    }
                }
            }
        } else {
            final float mp = 2f / Station.MAX_MEASUREMENTS;
            for (String key : data.keySet()) {
                if (data.get(key) != null && !key.equals("TEMP")) {
                    continue;
                }

                float calc = measurements.get(measurements.size() - 1).getData().get(key);
                for (WeatherMeasurement checker : measurements) {
                    calc = calc * (1 - mp) + mp * checker.getData().get(key);
                }

                data.putIfAbsent(key, calc);

                if (station.getTotalMeasurementsAdded() > MIN_MEASUREMENTS_ADDED && key.equals("TEMP") && data.get(key) - calc > TEMP_THRESHOLD) {
                    //System.out.println("Corrected temperature received: " + data.get(key) + " expected " + calc + " | Station: " + station.getName());
                    data.put(key, calc);
                }
            }
        }
    }

}
