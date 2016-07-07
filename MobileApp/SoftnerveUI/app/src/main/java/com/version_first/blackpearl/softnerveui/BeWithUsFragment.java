
package com.version_first.blackpearl.softnerveui;

import android.content.Intent;
import android.graphics.Typeface;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v4.view.ViewPager;
import android.view.Display;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.HorizontalScrollView;
import android.widget.LinearLayout;
import android.widget.RadioGroup;
import android.widget.TextView;
import java.util.ArrayList;

/**
 * A simple {@link Fragment} subclass.
 */
public class BeWithUsFragment extends Fragment {

    static HorizontalScrollView horizontalScrollView;
    static View layout;
    public BeWithUsFragment() {
        // Required empty public constructor
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        layout = inflater.inflate(R.layout.fragment_be_with_us, container, false);
        ViewPager viewPager = (ViewPager) layout.findViewById(R.id.intro_carousel_viewpager);
        int[] imageResources = {R.drawable.b03, R.drawable.b23, R.drawable.b32};
        IntroCarouselAdapter introCarouselAdapter = new IntroCarouselAdapter(getActivity(), imageResources);
        final RadioGroup radioGroup = (RadioGroup) layout.findViewById(R.id.radiogroup);
        viewPager.setOnPageChangeListener(new ViewPager.OnPageChangeListener() {
            @Override
            public void onPageScrolled(int position, float positionOffset, int positionOffsetPixels) {

            }

            @Override
            public void onPageSelected(int position) {
                switch (position) {
                    case 0:
                        radioGroup.check(R.id.radioButton);
                        break;
                    case 1:
                        radioGroup.check(R.id.radioButton2);
                        break;
                    case 2:
                        radioGroup.check(R.id.radioButton3);
                        break;
                }
            }

            @Override
            public void onPageScrollStateChanged(int state) {

            }
        });
        viewPager.setAdapter(introCarouselAdapter);

        TextView searchGlyph = (TextView) layout.findViewById(R.id.search_icon);
        Typeface font = Typeface.createFromAsset(getActivity().getAssets(), "fonts/font.ttf");
        searchGlyph.setTypeface(font);
        searchGlyph.setText("\uf002");


        horizontalScrollView = (HorizontalScrollView) layout.findViewById(R.id.hsv);
        LinearLayout ux = (LinearLayout) layout.findViewById(R.id.ux);
        LinearLayout engineering = (LinearLayout) layout.findViewById(R.id.engineering);
        LinearLayout sales = (LinearLayout) layout.findViewById(R.id.sales);
        LinearLayout marketing = (LinearLayout) layout.findViewById(R.id.marketing);
        LinearLayout healthcare = (LinearLayout) layout.findViewById(R.id.healthcare);

        Display display = getActivity().getWindowManager().getDefaultDisplay();
        int mWidth = display.getWidth(); // deprecated
        final int viewWidth = mWidth / 3;
        final LinearLayout.LayoutParams params;
        params = new LinearLayout.LayoutParams(viewWidth, LinearLayout.LayoutParams.MATCH_PARENT);

        ux.setLayoutParams(params);
        engineering.setLayoutParams(params);
        sales.setLayoutParams(params);
        marketing.setLayoutParams(params);
        healthcare.setLayoutParams(params);


        ux.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getActivity(), UXActivity.class);
                startActivity(intent);
            }
        });

        engineering.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getActivity(), EngineeringActivity.class);
                startActivity(intent);
            }
        });


        sales.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getActivity(), SalesActivity.class);
                startActivity(intent);
            }
        });


        marketing.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getActivity(), MarketingActivity.class);
                startActivity(intent);
            }
        });


        healthcare.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getActivity(), HealthcareActivity.class);
                startActivity(intent);
            }
        });
        return layout;
    }

    @Override
    public void onSaveInstanceState(Bundle outState) {
        super.onSaveInstanceState(outState);

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
