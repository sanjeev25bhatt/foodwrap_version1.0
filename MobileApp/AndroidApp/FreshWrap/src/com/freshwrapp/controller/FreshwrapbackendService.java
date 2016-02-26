package com.freshwrapp.controller;

import java.util.ArrayList;
import java.util.List;

import com.freshwrapp.Androidapp.freshwrapApplication;

import com.freshwrapp.constant.freshwrappconst;

import android.app.Service;
import android.content.Intent;
import android.graphics.Bitmap;
import android.os.Handler;
import android.os.HandlerThread;
import android.os.IBinder;
import android.os.Looper;
import android.os.Message;
import freshwrapInterface.freshwrapInterface;

public class FreshwrapbackendService extends Service {

	freshWrapHandler mm;
	Looper mlopOjbect;

	freshwrapInterface mInterfaceObject = null;
	freshwrapApplication globalVariable;

	@Override
	public IBinder onBind(Intent intent) {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public int onStartCommand(Intent intent, int flags, int startId) {
		// TODO Auto-generated method stub
		System.out.println("iiiiiiiiiiii>>");

		super.onStartCommand(intent, flags, startId);
		Message msg = mm.obtainMessage();
		msg.arg1 = 1;
		mm.sendMessage(msg);

		mInterfaceObject = (freshwrapInterface) globalVariable.getContext();
		return START_STICKY;
	}

	@Override
	public void onCreate() {
		// TODO Auto-generated method stub
		super.onCreate();
		HandlerThread hThread = new HandlerThread("ServiceStartArguments");
		hThread.start();
		mlopOjbect = hThread.getLooper();
		mm = new freshWrapHandler(mlopOjbect);
		globalVariable = (freshwrapApplication) getApplicationContext();
	}

	@Override
	public void onDestroy() {
		// TODO Auto-generated method stub
		super.onDestroy();
	}

	public class freshWrapHandler extends Handler {
		freshWrapHandler(Looper aLooper) {
			super(aLooper);
		}

		@Override
		public void handleMessage(Message msg) {
			// TODO Auto-generated method stub
			super.handleMessage(msg);

			switch (msg.arg1) {
			case 1: {
				freshwrappJson mTt = new freshwrappJson();
				List<Bitmap> mTemp = new ArrayList<Bitmap>();

				for (String tt : mTt.jsonParsing((String) mTt.processJsonRequest(
						freshwrappconst.IPADDRESS + ":8080/HelloWeb/FreshWrappController/getImageUrl", 0)))
					;
				{
					mTt = new freshwrappJson();
					Bitmap xx = (Bitmap) mTt.processJsonRequest(freshwrappconst.IPADDRESS
							+ ":8080/HelloWeb/FreshWrappController/getImage?aImageName=images.jpg", 1);
					mTemp.add(xx);
				}
				mInterfaceObject.saveImage(mTemp);
				stopSelf();
				break;
			}
			}
		}
	}

}
