package com.weatherApp.parser;

import com.weatherApp.model.WeatherMeasurement;
import org.xml.sax.Attributes;
import org.xml.sax.SAXException;
import org.xml.sax.helpers.DefaultHandler;

import javax.xml.parsers.ParserConfigurationException;
import javax.xml.parsers.SAXParser;
import javax.xml.parsers.SAXParserFactory;
import java.io.ByteArrayInputStream;
import java.io.IOException;
import java.util.ArrayList;
import java.util.HashMap;

public class XMLParser extends DefaultHandler {

    private boolean weatherDataOpen;
    private boolean measurementOpen;
    private String currentAttribute;
    private String currentValue;

    private HashMap<String, String> values;
    private ArrayList<WeatherMeasurement> measurements;


    public ArrayList<WeatherMeasurement> parse(ByteArrayInputStream xml) throws ParserConfigurationException, SAXException, IOException {
        measurements = new ArrayList<>();
        values = new HashMap<>();

        SAXParserFactory factory = SAXParserFactory.newInstance();
        SAXParser saxParser = factory.newSAXParser();
        saxParser.parse(xml, this);

        return measurements;
    }

    @Override
    public void startElement(String uri, String localName, String qName, Attributes attributes) throws SAXException {
        switch (qName) {
            case "WEATHERDATA":
                weatherDataOpen = true;
                break;

            case "MEASUREMENT":
                measurementOpen = true;
                break;

            default:
                currentAttribute = qName;
                break;
        }
    }

    @Override
    public void endElement(String uri, String localName, String qName) throws SAXException {
        switch (qName) {
            case "WEATHERDATA":
                weatherDataOpen = false;
                break;

            case "MEASUREMENT":
                measurementOpen = false;
                createWeatherMeasurement();
                values.clear();
                break;

            default:
                if (!currentAttribute.equals(qName)) {
                    currentValue = null;
                } else {
                    values.put(currentAttribute, currentValue);
                }
        }
    }

    @Override
    public void characters(char[] ch, int start, int length) throws SAXException {
        if (weatherDataOpen && measurementOpen) {
            currentValue = new String(ch, start, length);
        }
    }

    private void createWeatherMeasurement() {
        WeatherMeasurement measurement = new WeatherMeasurement();

        measurement.setStn(values.get("STN"));
        measurement.setDate(values.get("DATE"));
        measurement.setTime(values.get("TIME"));

        for (String key : values.keySet()) {
            if (key.equals("STN") || key.equals("DATE") || key.equals("TIME")) {
                continue;
            }

            measurement.getData().put(key, values.get(key).trim().isEmpty() ? null : Float.parseFloat(values.get(key)));
        }

        measurements.add(measurement);
    }

}
