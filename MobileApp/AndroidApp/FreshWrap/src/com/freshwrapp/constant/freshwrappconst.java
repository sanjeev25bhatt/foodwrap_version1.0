package com.freshwrapp.constant;

public class freshwrappconst {
	
	public static final String IPADDRESS  = "http://192.168.0.6" ;
	public static final String PORT = "8080" ;
	public static final String BLACKSLASH = "/" ;
	public static final String HOMEPAGE = IPADDRESS + "/sanjeev_test/foodwrap_version1.0/xxx/";
	public final static String TAG_EMPLOYEE = "Employee" ;
	public final static String TAG_ADDRESS  = "address";
	public final static String TAG_IMAGE 	= "Image" ;
	public final static String TAG_URL 	= "image" ;
	public final static int  TAG_SUCCESS = 200 ;
	public final static int TAG_FAILURE = -1 ;
	public enum Http {
		HTTP_OK(200);

		private Http(int aValue) {
			mValue = aValue;
		}

		private int mValue;
	}
}
