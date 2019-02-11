package com.weatherApp;

import com.google.gson.Gson;
import com.weatherApp.httpd.Request;
import com.weatherApp.model.Reading;
import com.weatherApp.model.Station;
import com.weatherApp.model.WeatherMeasurement;
import com.weatherApp.parser.XMLParser;
import com.weatherApp.server.Server;
import com.weatherApp.server.ServerThread;
import org.xml.sax.SAXException;

import javax.xml.parsers.ParserConfigurationException;
import java.io.ByteArrayInputStream;
import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Paths;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Timer;
import java.util.TimerTask;
import java.util.concurrent.ConcurrentHashMap;

public class Engine {

    private Server server;
    private ConcurrentHashMap<String, Station> stations;

    public Engine() {
        server = new Server();
        stations = new ConcurrentHashMap<>();

        ServerThread.dataEvent.addListener(bytes -> {
            try {
                XMLParser parser = new XMLParser();
                ArrayList<WeatherMeasurement> measurements = parser.parse(new ByteArrayInputStream(bytes));
                measurements.forEach(measurement -> {
                    Station station = stations.get(measurement.getStn());
                    Correction.Correct(measurement, station);
                    station.addMeasurement(measurement);
                });
            } catch (ParserConfigurationException | SAXException | IOException e) {
                e.printStackTrace();
            }
        });

        Timer timer = new Timer();
        timer.schedule(new TimerTask() {
            @Override
            public void run() {
                doRequest();
                java.lang.System.gc();
            }
        }, 0, 60000);
    }

    private void doRequest() {
        System.out.println("Posting requests to https://wx.dralla.eu/endpoint.php");

        ArrayList<Reading> readings = new ArrayList<>();
        for(Station station : stations.values()) {
            if (station.getMeasurements().size() > 0) {
                readings.add(new Reading(station));
            }
        }

        for (int i = 0; i < readings.size(); i+= 50) {
            int finalI = i;
            Thread t = new Thread(() -> {
                HashMap<String, String> data = new HashMap<>();

                if (finalI >= readings.size()) {
                    return;
                }

                data.put("json", new Gson().toJson(readings.subList(finalI, finalI +50)));

                try {
                    int status = Request.post("https://wx.dralla.eu/endpoint.php", data);//https://wx.dralla.eu/endpoint.php
                    if (status != 200) {
                        System.out.println("Request returned with status " + status);
                    }
                } catch (IOException e) {
                    e.printStackTrace();
                }
                //System.out.println("Done posting request " + finalI / 50);
            });
            t.start();
        }
    }

    public void start() {
        loadStations();
        server.start();
    }

    private void loadStations() {
        System.out.println("Loading stations");

        try {
            System.out.println();

            String json = new String(Files.readAllBytes(Paths.get(System.getProperty("user.dir") + "/data/stations.json")));
            Station[] entries = new Gson().fromJson(json, Station[].class);

            for (Station station : entries) {
                stations.put(station.getStn(), station);
            }

            System.out.println(stations.size());
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public static void main(String[] args) {
        Engine engine = new Engine();
        engine.start();
    }

}
