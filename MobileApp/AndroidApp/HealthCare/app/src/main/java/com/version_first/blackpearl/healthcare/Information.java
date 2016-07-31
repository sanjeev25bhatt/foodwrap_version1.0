package com.version_first.blackpearl.healthcare;

import android.util.Log;

import org.json.JSONArray;

import java.util.ArrayList;
import java.util.List;

/**
 * Created by Black Pearl on 7/24/2016.
 */
public class Information {

    static JSONArray jsonDocDetailsArray;

    public void setJsonDocDetails(JSONArray jsonDocDetailsArray) {
        this.jsonDocDetailsArray = jsonDocDetailsArray;
    }

    public JSONArray getJsonDocDetailsArray() {
        return jsonDocDetailsArray;
    }
}
