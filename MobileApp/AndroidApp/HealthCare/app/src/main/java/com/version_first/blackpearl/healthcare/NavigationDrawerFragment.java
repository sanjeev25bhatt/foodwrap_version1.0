package com.version_first.blackpearl.healthcare;


import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.support.v7.widget.Toolbar;
import android.widget.ExpandableListView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.LinkedHashMap;
import java.util.List;


/**
 * A simple {@link Fragment} subclass.
 */
public class NavigationDrawerFragment extends Fragment {


    LinkedHashMap<String, List<String>> Main_Menu;
    List<String> Menu_Head;
    ExpandableListView Exp_list;
    NavDrawerAdapter adapter;

    public static final String PREF_FILE_NAME="testpref";
    public static final String KEY_USER_LEARNED_DRAWER = "user_learned_drawer";
    // used with on open on close
    private ActionBarDrawerToggle mDrawerToggle;
    private DrawerLayout mDrawerLayout;
    private View containerView;
    /* whether the user is aware for drawer existence or not, when the drawer is opened the very first time we'll store the value of mUserLearnedDrawer
    * in shared preferences file. If it is already saved and we can get a value for that, then we wont show the drawer, otherwise we'll.
    */
    private boolean mUserLearnedDrawer;
    //whether fragment is started the very first time or it is coming from the rotation of the screen
    private boolean mFromSavedInstanceState;

    public NavigationDrawerFragment() {
        // Required empty public constructor

    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        mUserLearnedDrawer = Boolean.valueOf(readFromPreferences(getActivity(), KEY_USER_LEARNED_DRAWER, "false"));
        if(savedInstanceState!=null) {
            mFromSavedInstanceState = true;
        }

    }

    @Override
    public View onCreateView(LayoutInflater inflater, final ViewGroup container, Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View layout = inflater.inflate(R.layout.fragment_navigation_drawer, container, false);

        Exp_list = (ExpandableListView) layout.findViewById(R.id.exp_list);
        Exp_list.setGroupIndicator(null);
        Main_Menu = MenuDataProvider.getInfo();
        Menu_Head = new ArrayList<String>(Main_Menu.keySet());
        adapter = new NavDrawerAdapter(getActivity(), Main_Menu, Menu_Head);
        Exp_list.setAdapter(adapter);
        Exp_list.setOnGroupClickListener(new ExpandableListView.OnGroupClickListener() {
            @Override
            public boolean onGroupClick(ExpandableListView parent, View v, int groupPosition, long id) {
                mDrawerLayout.closeDrawer(containerView);
                switch (Menu_Head.get(groupPosition)){
                    case "Home":
                        break;
                    case "24/7 Live Support":
                        break;
                    case "Rate this app":
                        break;
                    case "Settings":
                        break;
                    case "Legal":
                        break;
                    case "About Us":
                        break;
                    case "Feedback":
                        break;
                }

                return true;
            }
        });
        return layout;
    }

    public void setUp(int fragment_id,DrawerLayout drawerLayout, Toolbar toolbar) {
        containerView = getActivity().findViewById(fragment_id);
        mDrawerLayout = drawerLayout;
        mDrawerToggle = new ActionBarDrawerToggle(getActivity(), drawerLayout, toolbar, R.string.drawer_open, R.string.drawer_close){
            @Override
            public void onDrawerOpened(View drawerView) {
                super.onDrawerOpened(drawerView);
                /* when the drawer is opened for the first time we will set mUserLearnedDrawer to true
                *  and we'll save its value in shared preferences file for future usage.
                * */
                /* if the drawer is never opened then by default the value of mUserLearnedDrawer will be false, hence we'll set the value of
                 * mUserLearnedDrawer to true, telling that the drawer has opened once
                 */
                if(!mUserLearnedDrawer) {
                    mUserLearnedDrawer = true;
                    saveToPreferences(getActivity(), KEY_USER_LEARNED_DRAWER, mUserLearnedDrawer+"");
                }
                //the drawer is opened with the main content of the subsequent activity beside it, so the actionbar needs to be redrawn
                getActivity().invalidateOptionsMenu();
            }

            @Override
            public void onDrawerClosed(View drawerView) {
                super.onDrawerClosed(drawerView);
                getActivity().invalidateOptionsMenu();
            }
        };
        //if the user has never seen the drawer
        if(!mUserLearnedDrawer && !mFromSavedInstanceState) {
            mDrawerLayout.openDrawer(containerView);
        }

        mDrawerLayout.setDrawerListener(mDrawerToggle);
        mDrawerLayout.post(new Runnable() {
            @Override
            public void run() {
                mDrawerToggle.syncState();
            }
        });
    }

    public static void saveToPreferences(Context context, String preferenceName, String preferenceValue) {
        //one parameter is the name of the file and with the other parameter we ensure that only our app will access or edit the shared pref file.
        SharedPreferences sharedPreferences = context.getSharedPreferences(PREF_FILE_NAME, Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPreferences.edit();
        editor.putString(preferenceName, preferenceValue);
        editor.apply();
    }

    // taking in the default value in case there is no previous value
    public static String readFromPreferences(Context context, String preferences, String defaultValue) {
        SharedPreferences sharedPreferences = context.getSharedPreferences(PREF_FILE_NAME, Context.MODE_PRIVATE);
        return sharedPreferences.getString(preferences, defaultValue);
    }
}
