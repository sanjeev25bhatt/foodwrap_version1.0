package com.freshwrapp.controller;

import java.io.BufferedInputStream;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import com.freshwrapp.constant.freshwrappconst;

import android.graphics.BitmapFactory;
import android.util.Log;

public class freshwrappJson {

	private static final String LOGGING_TAG = "freshwrappJson";

	public Object processJsonRequest(String aURL, int asendReq) {
		URL mURL;
		Object stream;
		int rest = -1 ;
		try {
			mURL = new URL(aURL);
			HttpURLConnection mUrlconnection = (HttpURLConnection) mURL.openConnection();
			mUrlconnection.setConnectTimeout(1000);
			mUrlconnection.connect();
			int res = mUrlconnection.getResponseCode();
			if (mUrlconnection.getResponseCode() == 200) {
				InputStream in = new BufferedInputStream(mUrlconnection.getInputStream());
				if (asendReq == 1) {
					stream = BitmapFactory.decodeStream(in);
				} else {
					// Read the BufferedInputStream
					BufferedReader r = new BufferedReader(new InputStreamReader(in));
					StringBuilder sb = new StringBuilder();
					String line;
					while ((line = r.readLine()) != null) {
						sb.append(line);
					}
					stream = sb.toString();
					r.close();
				}
				in.close();

				mUrlconnection.disconnect();
				return stream;
			}

		} catch (MalformedURLException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			
		}
		return null;

	}

	public List<String> jsonParsing(String stream) {
		List<String> tArray = new ArrayList<String>();
		try {
			JSONObject mObject = new JSONObject(stream);
			JSONArray iArray = mObject.getJSONArray(freshwrappconst.TAG_IMAGE);
			int i;
			for (i = 0; i < iArray.length(); i++) {
				JSONObject c = iArray.getJSONObject(i);
				String ad = c.getString(freshwrappconst.TAG_URL);
				tArray.add(ad);
				Log.d(LOGGING_TAG, ad);

			}
		} catch (JSONException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

		Log.i(LOGGING_TAG, stream);
		return tArray;
	}

}
