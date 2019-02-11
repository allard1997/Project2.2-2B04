package com.weatherApp.parser;

import com.weatherApp.model.WeatherMeasurement;

import java.util.ArrayList;

public class CSVParser {

    //STN,DATE,TIME,TEMP,DEWP,STP,SLP,VISIB,WDSP,PRCP,SNDP,FRSHTT,CLDC,WNDDIR

    public String toCSV(ArrayList<WeatherMeasurement> weatherMeasurements) {
        StringBuilder csv = new StringBuilder();

        csv.append("STN,DATE,TIME,TEMP,DEWP,STP,SLP,VISIB,WDSP,PRCP,SNDP,FRSHTT,CLDC,WNDDIR \n");

        weatherMeasurements.forEach(measurement -> {
            StringBuilder values = new StringBuilder();
            values.append(measurement.getStn() + ",");
            values.append(measurement.getDate() + ",");
            values.append(measurement.getTime() + ",");
            values.append("\n");

            csv.append(values);
        });

        return csv.toString();
    }

}
