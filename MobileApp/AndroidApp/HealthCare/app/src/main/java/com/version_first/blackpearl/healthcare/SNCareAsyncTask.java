package com.version_first.blackpearl.healthcare;

import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.util.Log;

/**
 * Created by sanjeev24bhatt on 7/26/2016.
 */


class SNCareAsyncTaskTaskRunner extends AsyncTask<String, Void, Void> {

    Context _contextObject = null ;
    SNCareAsyncTaskTaskRunner(Context aContextObject) {
        _contextObject =  aContextObject ;
    }

    @Override
    protected Void doInBackground(String... params) {

        final SNCareHttpClient object = new SNCareHttpClient();
        String URL = (String) params[0];
        Log.d("sanjeev","inside"+ URL);
        object.HandleRequest(URL);
        return null;
    }

    @Override
    protected void onPreExecute() {
        super.onPreExecute();
    }

    @Override
    protected void onProgressUpdate(Void... values) {
        super.onProgressUpdate(values);
    }

    @Override
    protected void onPostExecute(Void result) {

        Intent intent = new Intent(_contextObject, DoctorsDetailList.class);
        _contextObject.startActivity(intent);
        super.onPostExecute(result);

    }
}

