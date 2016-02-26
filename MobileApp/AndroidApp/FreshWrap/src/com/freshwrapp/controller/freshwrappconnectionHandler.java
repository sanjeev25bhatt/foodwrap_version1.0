package com.freshwrapp.controller;

import java.io.BufferedInputStream;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

import com.freshwrappmodel.freshwrappjsonParser;

public class freshwrappconnectionHandler {

	public 
	static int processJsonRequest(String aURL) {
		URL mURL;
		try {
			mURL = new URL(aURL);
			HttpURLConnection mUrlconnection = (HttpURLConnection) mURL.openConnection();
			mUrlconnection.setConnectTimeout(1000);
			mUrlconnection.connect();
			int res = mUrlconnection.getResponseCode();
			if (mUrlconnection.getResponseCode() == 200) {
				InputStream in = new BufferedInputStream(mUrlconnection.getInputStream());

				// Read the BufferedInputStream
				BufferedReader r = new BufferedReader(new InputStreamReader(in));
				StringBuilder sb = new StringBuilder();
				String line;
				while ((line = r.readLine()) != null) {
					sb.append(line);
				}
				String stream = sb.toString();
				freshwrappjsonParser aObject = new freshwrappjsonParser(stream, "1");
				if (!aObject.Parse()) {
					res = -1;
				}

				
				in.close();
				r.close();

				mUrlconnection.disconnect();
				return res;
			}

		} catch (MalformedURLException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return -1;

	}

}
