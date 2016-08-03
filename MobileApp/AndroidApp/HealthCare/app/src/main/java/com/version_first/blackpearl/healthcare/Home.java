package com.version_first.blackpearl.healthcare;


import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v4.view.ViewPager;
import android.util.Log;
import android.view.Display;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.LinearLayout;
import android.widget.RadioGroup;
import android.widget.RelativeLayout;


/**
 * A simple {@link Fragment} subclass.
 */
public class Home extends Fragment {


    public Home() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment

        View layout = inflater.inflate(R.layout.fragment_home, container, false);
        ViewPager viewPager = (ViewPager) layout.findViewById(R.id.intro_carousel_viewpager);
        int[] imageResources = {R.drawable.b03, R.drawable.b23, R.drawable.b32};
        final IntroCarouselAdapter introCarouselAdapter = new IntroCarouselAdapter(getActivity(), imageResources);
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
        LinearLayout general_physician = (LinearLayout) layout.findViewById(R.id.general_physician);
        LinearLayout dermatologist = (LinearLayout) layout.findViewById(R.id.dermatologist);
        LinearLayout endocrinologist = (LinearLayout) layout.findViewById(R.id.endocrinologist);
        LinearLayout gynec = (LinearLayout) layout.findViewById(R.id.gynec);

        Display display = getActivity().getWindowManager().getDefaultDisplay();
        int mWidth = display.getWidth(); // deprecated
        final int viewWidth = (mWidth / 2) - 10;
        final double floatHeight = 0.7 * viewWidth;
        final int viewHeight = (int) Math.round(floatHeight);
        final LinearLayout.LayoutParams params;
        params = new LinearLayout.LayoutParams(viewWidth, viewHeight);
        params.setMargins(1, 1, 1, 1);

        general_physician.setLayoutParams(params);
        dermatologist.setLayoutParams(params);
        endocrinologist.setLayoutParams(params);
        gynec.setLayoutParams(params);


        RelativeLayout checking_click = (RelativeLayout) layout.findViewById(R.id.cosultdoctorlayout);
        // bekar code, need to change
        checking_click.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                SNCareAsyncTaskTaskRunner runner = new SNCareAsyncTaskTaskRunner(getContext());

                runner.execute("https://boiling-falls-25166.herokuapp.com/softnervecontroller/getdoctorDetails");

               // runner.execute(SNCareConst.SNERVEIPDRESS + "getdoctorDetails");
            }
        });
        RelativeLayout onlinemed_click = (RelativeLayout) layout.findViewById(R.id.online_medicinelayout);
        onlinemed_click.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                SNCareAsyncTaskTaskRunner runner = new SNCareAsyncTaskTaskRunner(getContext());
                runner.execute(SNCareConst.SNERVEIPDRESS + "getmedicinedetails");
            }
        });



    return layout;

}



}
