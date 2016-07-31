package com.version_first.blackpearl.healthcare;

import android.util.Log;

import org.json.JSONArray;
import org.json.JSONObject;

/**
 * Created by Black Pearl on 7/24/2016.
 */
public class SNCareJsonParser implements SNParsorInterface {

    @Override
    public void parseJsonObject(String aData) {
        try{
            JSONObject jsonData = new JSONObject(aData);
            JSONArray jsonArray = new JSONArray(jsonData.getString("DoctorDetails"));
            Log.d("JsonData" , "hello" + jsonArray);
            /*JSONObject jObject = null;

            for(int i=0; i<jsonArray.length();i++) {
                jObject = jsonArray.getJSONObject(i);
                String address = jObject.getString("address");
                Information information = new Information();
                information.setAddress(address);
            }*/
            Information information = new Information();
            information.setJsonDocDetails(jsonArray);

        } catch (Exception e){

        }
    }
}
