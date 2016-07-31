package com.version_first.blackpearl.healthcare;

import java.util.ArrayList;
import java.util.LinkedHashMap;
import java.util.List;

/**
 * Created by Black Pearl on 6/22/2016.
 */
public class MenuDataProvider {
    public static LinkedHashMap<String, List<String>> getInfo() {
        LinkedHashMap<String, List<String>> MainMenu = new LinkedHashMap<String, List<String>>();

        List<String> Home = new ArrayList<String>();
        List<String> Live_Support = new ArrayList<String>();
        List<String> Rate_App = new ArrayList<String>();
        List<String> Settings = new ArrayList<String>();
        List<String> Legal = new ArrayList<String>();
        List<String> About_us = new ArrayList<String>();
        List<String> Feedback = new ArrayList<String>();

        MainMenu.put("Home", Home);
        MainMenu.put("24/7 Live Support", Live_Support);
        MainMenu.put("Rate this app", Rate_App);
        MainMenu.put("Settings", Settings);
        MainMenu.put("Legal", Legal);
        MainMenu.put("About Us", About_us);
        MainMenu.put("Feedback", Feedback);

        return MainMenu;
    }
}
