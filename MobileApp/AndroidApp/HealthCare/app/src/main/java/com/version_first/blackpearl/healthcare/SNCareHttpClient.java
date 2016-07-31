package com.version_first.blackpearl.healthcare;

import android.util.Log;

import java.io.BufferedInputStream;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.nio.charset.MalformedInputException;

/**
 * Created by Black Pearl on 7/24/2016.
 */
public class SNCareHttpClient {


    void HandleRequest(String aUrlRequest) {


        try {

            URL url = new URL(aUrlRequest);
            StringBuilder result = new StringBuilder() ;
            HttpURLConnection urlConnection = (HttpURLConnection) url.openConnection();
            urlConnection.setDoInput(true);
            urlConnection.setConnectTimeout(5 * 1000);

            urlConnection.setReadTimeout(5 * 1000);

            if (urlConnection.getResponseCode() == HttpURLConnection.HTTP_OK) {
                try {
                    InputStream in = new BufferedInputStream(urlConnection.getInputStream());

                    BufferedReader reader = new BufferedReader(new InputStreamReader(in));

                    String line = null;

                    while ((line = reader.readLine()) != null) {
                        result.append(line);
                    }

                    SNParsorInterface aPareintrObject = new SNCareJsonParser();
                    aPareintrObject.parseJsonObject(result.toString());
                } finally {
                    urlConnection.disconnect();
                }
            }



        } catch (MalformedURLException e) {

        } catch (IOException e) {

        } catch (Exception e) {
            e.printStackTrace();
        }
        System.out.println("inside out" + aUrlRequest);
    }

    void notifyUx() {

    }
}
