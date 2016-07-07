package com.version_first.blackpearl.softnerveui;

import android.graphics.Color;
import android.graphics.Point;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentTransaction;
import android.support.v4.view.ViewPager;
import android.view.Display;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.HorizontalScrollView;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.RadioGroup;
import android.widget.TextView;

import java.util.ArrayList;

/**
 * A simple {@link Fragment} subclass.
 */
public class WhatWeDoFragment extends Fragment {

    static HorizontalScrollView horizontalScrollView;
    static View layout, olderView;
    ExpertiseDescriptionFragment fragment = new ExpertiseDescriptionFragment();
    public WhatWeDoFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        // Inflate the layout for this fragment\
        layout = inflater.inflate(R.layout.fragment_what_we_do, container, false);

        horizontalScrollView = (HorizontalScrollView) layout.findViewById(R.id.hsv);
        LinearLayout designStudio = (LinearLayout) layout.findViewById(R.id.design_studio);
        LinearLayout webExperience = (LinearLayout) layout.findViewById(R.id.web_experience);
        LinearLayout mobility = (LinearLayout) layout.findViewById(R.id.mobility);
        LinearLayout iot = (LinearLayout) layout.findViewById(R.id.iot);
        LinearLayout cloudAndPass = (LinearLayout) layout.findViewById(R.id.cloud_and_pass);
        LinearLayout productBranding = (LinearLayout) layout.findViewById(R.id.product_branding);

        LinearLayout freshwrap = (LinearLayout) layout.findViewById(R.id.freshwrap);
        LinearLayout squareChat = (LinearLayout) layout.findViewById(R.id.square_chat);
        LinearLayout muchMore = (LinearLayout) layout.findViewById(R.id.much_more);

        Display display = getActivity().getWindowManager().getDefaultDisplay();
        int mWidth = display.getWidth(); // deprecated
        final int viewWidth = mWidth / 3;
        final LinearLayout.LayoutParams params;
        params = new LinearLayout.LayoutParams(viewWidth, LinearLayout.LayoutParams.MATCH_PARENT);

        designStudio.setLayoutParams(params);
        webExperience.setLayoutParams(params);
        mobility.setLayoutParams(params);
        iot.setLayoutParams(params);
        cloudAndPass.setLayoutParams(params);
        productBranding.setLayoutParams(params);
        freshwrap.setLayoutParams(params);
        squareChat.setLayoutParams(params);
        muchMore.setLayoutParams(params);

        FragmentTransaction childFragmentTransaction = getChildFragmentManager().beginTransaction();
        childFragmentTransaction.replace(R.id.to_be_replaced, fragment);
        childFragmentTransaction.commit();
        return layout;
    }

    @Override
    public void onSaveInstanceState(Bundle outState) {
        super.onSaveInstanceState(outState);

    }

    public void call(View v, Display display) {
        Point size = new Point();
        display.getSize(size);
        final int width = size.x;
        LinearLayout linearLayout = (LinearLayout) layout.findViewById(v.getId());
        int center = (width-linearLayout.getWidth())/2;
        horizontalScrollView.smoothScrollTo(linearLayout.getLeft() - center, linearLayout.getTop());
        if(olderView!=null) {
            LinearLayout linear = (LinearLayout) layout.findViewById(olderView.getId());
            ArrayList<View> LastChildren = getAllChildren(linear);
            View lastImageView = LastChildren.get(2);
            int lastImageViewId = lastImageView.getId();
            View lastTextView = LastChildren.get(4);
            int lastTextViewId = lastTextView.getId();
            ImageView visitedImageView = (ImageView) layout.findViewById(lastImageViewId);
            TextView visitedTextView = (TextView) layout.findViewById(lastTextViewId);
            visitedImageView.setColorFilter(Color.BLACK);
            visitedTextView.setTextColor(Color.BLACK);
        }
        olderView = v;
        ArrayList<View> LatestChildren = getAllChildren(v);
        View latestImageView = LatestChildren.get(2);
        int latestImageViewId = latestImageView.getId();
        View latestTextView = LatestChildren.get(4);
        int latestTextViewId = latestTextView.getId();
        ImageView imageView = (ImageView) layout.findViewById(latestImageViewId);
        TextView textView = (TextView) layout.findViewById(latestTextViewId);
        imageView.setColorFilter(Color.parseColor("#72c05b"));
        textView.setTextColor(Color.parseColor("#72c05b"));

        switch (v.getId()) {
            case R.id.design_studio:
                fragment.changeData(0, "move left", center);
                break;
            case R.id.web_experience:
                fragment.changeData(1, "center", center);
                break;
            case R.id.mobility:
                fragment.changeData(2, "center", center);
                break;
            case R.id.iot:
                fragment.changeData(3, "center", center);
                break;
            case R.id.cloud_and_pass:
                fragment.changeData(4, "center", center);
                break;
            case R.id.product_branding:
                fragment.changeData(5, "move right", center);
                break;
            default:
                break;
        }
    }

    private ArrayList<View> getAllChildren(View v) {
        if(!(v instanceof ViewGroup)) {
            ArrayList<View> viewArrayList = new ArrayList<View>();
            viewArrayList.add(v);
            return viewArrayList;
        }
        ArrayList<View> result = new ArrayList<View>();
        ViewGroup vg = (ViewGroup)v;

        for(int i=0, n=vg.getChildCount(); i<n; i++) {
            View child = vg.getChildAt(i);
            ArrayList<View> viewArrayList = new ArrayList<View>();
            viewArrayList.add(v);
            viewArrayList.addAll(getAllChildren(child));

            result.addAll(viewArrayList);
        }
        return result;
    }

}
