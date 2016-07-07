package com.version_first.blackpearl.softnerveui;

import android.content.res.Resources;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.util.Log;
import android.view.Gravity;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.LinearLayout;
import android.widget.TextView;


/**
 * A simple {@link Fragment} subclass.
 */
public class ExpertiseDescriptionFragment extends Fragment {

    static TextView description;
    static String[] Descriptions;
    static LinearLayout description_box;
    static LinearLayout.LayoutParams layoutParams;
    static Button button;
    static int i, center;
    static String action;
    public ExpertiseDescriptionFragment() {

    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        if(savedInstanceState != null) {
            i = savedInstanceState.getInt("i");
            action = savedInstanceState.getString("action");
            center = savedInstanceState.getInt("center");
            changeData(i, action, center);
        }
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View layout = inflater.inflate(R.layout.fragment_expertise_description, container, false);
        button = (Button) layout.findViewById(R.id.arrow_up);
        return layout;
    }

    @Override
    public void onActivityCreated(Bundle savedInstanceState) {
        super.onActivityCreated(savedInstanceState);
        description = (TextView) getActivity().findViewById(R.id.fragment_expertise_description);
        Resources res = getResources();
        Descriptions = res.getStringArray(R.array.expertise_description);
        description_box = (LinearLayout) getActivity().findViewById(R.id.expertise_description_box);
        description_box.setVisibility(LinearLayout.GONE);
        layoutParams = new LinearLayout.LayoutParams(LinearLayout.LayoutParams.MATCH_PARENT, LinearLayout.LayoutParams.MATCH_PARENT);
        layoutParams.setMargins(10, 0, 10, 0);
    }

    @Override
    public void onSaveInstanceState(Bundle outState) {
        super.onSaveInstanceState(outState);
        outState.putInt("i", i);
        outState.putInt("center", center);
        outState.putString("action", action);
    }

    public void changeData(int i, String action, int center) {
        this.action = action;
        this.i = i;
        this.center = center;
        description_box.setLayoutParams(layoutParams);
        description_box.setVisibility(LinearLayout.VISIBLE);
        description.setBackgroundResource(R.drawable.description_box);
        description.setText(Descriptions[i]);
        int margin = (center/2)-30;
        LinearLayout.LayoutParams params = (LinearLayout.LayoutParams)button.getLayoutParams();
        if(action == "move left") {
            params.gravity = Gravity.LEFT;
            params.setMargins(margin, 0, 0, 0);
        } else if(action == "move right") {
            params.gravity = Gravity.RIGHT;
            params.setMargins(0, 0, margin, 0);
        } else {
            params.setMargins(0, 0, 0, 0);
            params.gravity = Gravity.CENTER_HORIZONTAL;
        }
        button.setLayoutParams(params);
    }

}
