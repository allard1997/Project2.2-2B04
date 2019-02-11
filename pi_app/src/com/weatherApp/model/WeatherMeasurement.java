package com.weatherApp.model;

import java.util.HashMap;

public class WeatherMeasurement {

    private String stn;
    private String date;
    private String time;

    private HashMap<String, Float> data;

    public WeatherMeasurement() {
        data = new HashMap<>();

        data.put("TEMP", null);
        data.put("DEWP", null);
        data.put("STP", null);
        data.put("SLP", null);
        data.put("VISIB", null);
        data.put("WDSP", null);
        data.put("PRCP", null);
        data.put("SNDP", null);
        data.put("FRSHTT", null);
        data.put("CLDC", null);
        data.put("WNDDIR", null);
    }

    public HashMap<String, Float> getData() {
        return data;
    }

    public String getDate() {
        return date;
    }

    public void setDate(String date) {
        this.date = date;
    }

    public String getTime() {
        return time;
    }

    public void setTime(String time) {
        this.time = time;
    }

    public String getStn() {
        return stn;
    }

    public void setStn(String stn) {
        this.stn = stn;
    }
}
