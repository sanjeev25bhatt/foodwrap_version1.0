package com.version_first.blackpearl.healthcare;

import android.Manifest;
import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.graphics.Typeface;
import android.net.Uri;
import android.support.v4.app.ActivityCompat;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.lang.reflect.Type;

/**
 * Created by Black Pearl on 7/24/2016.
 */
public class DocsDetailAdapter extends RecyclerView.Adapter<DocsDetailAdapter.MyViewHolder> {
    private LayoutInflater inflater;

    static JSONArray docDetailsJsonArray;

    public DocsDetailAdapter(Context context, JSONArray docDetailsJsonArray) {
        inflater = LayoutInflater.from(context);
        this.docDetailsJsonArray = docDetailsJsonArray;
        Log.d("Array List", "DATA: " + docDetailsJsonArray);
    }

    @Override
    public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View view = inflater.inflate(R.layout.doc_detail_row, parent, false);
        MyViewHolder holder = new MyViewHolder(view);
        return holder;
    }

    @Override
    public void onBindViewHolder(MyViewHolder holder, int position) {
        JSONObject docObject = null;
        String docName = null;
        String docAddress = null;
        String docDegree = null;
        String docPreviousRecord = null;
        String docSpecialization = null;
        String docExperience = null;
        String docPhoneNumber = null;

        try {
            docObject = (JSONObject) docDetailsJsonArray.get(position);
            docName = docObject.getString("mName");
            docAddress = docObject.getString("address");
            docDegree = docObject.getString("mDegree");
            docPreviousRecord = docObject.getString("mPreviousRecord");
            docSpecialization = docObject.getString("mSpecialization");
            docExperience = docObject.getString("mExperience");
            docPhoneNumber = docObject.getString("mPhoneNumber");
        } catch (JSONException e) {
            e.printStackTrace();
        }
        holder.docName.setText(docName);
        holder.docSpeciality.setText(docSpecialization);
        holder.docDegree.setText(docDegree);
        holder.peopleHelped.setText(docPreviousRecord);
        holder.experience.setText(docExperience);

        final String phoneNumber = docPhoneNumber;

        holder.phoneCall.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent callIntent = new Intent(Intent.ACTION_CALL);
                callIntent.setData(Uri.parse("tel:"+phoneNumber));
                if (ActivityCompat.checkSelfPermission(v.getContext(), Manifest.permission.CALL_PHONE) != PackageManager.PERMISSION_GRANTED) {
                    // TODO: Consider calling
                    //    ActivityCompat#requestPermissions
                    // here to request the missing permissions, and then overriding
                    //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
                    //                                          int[] grantResults)
                    // to handle the case where the user grants the permission. See the documentation
                    // for ActivityCompat#requestPermissions for more details.
                    return;
                }
                v.getContext().startActivity(callIntent);
            }
        });
    }

    @Override
    public int getItemCount() {
        if(docDetailsJsonArray != null) {
            return docDetailsJsonArray.length();
        }
        return 0;
    }

    class MyViewHolder extends RecyclerView.ViewHolder {

        TextView docName, docDegree, docSpeciality, likeIcon, expIcon, peopleHelped, experience;
        ImageView phoneCall;
        public MyViewHolder(View itemView) {
            super(itemView);
            Typeface font = Typeface.createFromAsset(itemView.getContext().getAssets(), "fonts/font.ttf");
            likeIcon = (TextView) itemView.findViewById(R.id.like_icon);
            expIcon = (TextView) itemView.findViewById(R.id.exp_icon);
            likeIcon.setTypeface(font);
            expIcon.setTypeface(font);
            likeIcon.setText("\uf004");
            expIcon.setText("\uf0f2");
            docName = (TextView) itemView.findViewById(R.id.doc_name);
            docDegree = (TextView) itemView.findViewById(R.id.doc_degree);
            docSpeciality = (TextView) itemView.findViewById(R.id.doc_speciality);
            peopleHelped = (TextView) itemView.findViewById(R.id.peoples_helped);
            experience = (TextView) itemView.findViewById(R.id.exp_years);
            phoneCall = (ImageView) itemView.findViewById(R.id.call);
        }
    }
}


