package com.freshwrappmodel;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import com.freshwrapp.constant.freshwrappconst;

public class freshwrappjsonParser {

	private String _mStream = null;
	public freshwrappjsonParser(String aStream, String aRequest) {
		_mStream = aStream;
	}

	public boolean Parse() {
		try {
			JSONObject mObject = new JSONObject(_mStream);

			JSONArray iArray = mObject.getJSONArray(freshwrappconst.TAG_EMPLOYEE);
			int i;
			for (i = 0; i < iArray.length(); i++) {
				JSONObject c = iArray.getJSONObject(i);
				String add = c.getString(freshwrappconst.TAG_ADDRESS);

			}
		} catch (JSONException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			return false ;
		}
		return true; 
	}
	
}
