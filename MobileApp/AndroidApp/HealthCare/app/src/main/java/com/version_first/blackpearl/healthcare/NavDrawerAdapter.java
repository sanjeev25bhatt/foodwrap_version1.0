package com.version_first.blackpearl.healthcare;

import android.content.Context;
import android.graphics.Typeface;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseExpandableListAdapter;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toolbar;

import java.util.HashMap;
import java.util.List;

/**
 * Created by Black Pearl on 6/22/2016.
 */
public class NavDrawerAdapter extends BaseExpandableListAdapter {
    private Context context;
    private HashMap<String, List<String>> Movies_Category;
    private List<String> Movies_List;
    private int[] images;
    public NavDrawerAdapter(Context context, HashMap<String, List<String>> Movies_Category, List<String> Movies_List) {
        this.context = context;
        this.Movies_Category = Movies_Category;
        this.Movies_List = Movies_List;
        images = new int[]{R.mipmap.ic_home, R.mipmap.ic_perm_phone_msg_black_24dp, R.mipmap.ic_star_border_black_24dp, R.mipmap.ic_settings_black_24dp, R.mipmap.ic_description_black_24dp,R.mipmap.ic_help_black_24dp, R.mipmap.ic_chat_black_24dp};
    }

    @Override
    public int getGroupCount() {
        return Movies_List.size();
    }

    @Override
    public int getChildrenCount(int groupPosition) {
        return Movies_Category.get(Movies_List.get(groupPosition)).size();
    }

    @Override
    public Object getGroup(int groupPosition) {
        return Movies_List.get(groupPosition);
    }

    @Override
    public Object getChild(int parent, int child) {
        return Movies_Category.get(Movies_List.get(parent)).get(child);
    }

    @Override
    public long getGroupId(int groupPosition) {
        return groupPosition;
    }

    @Override
    public long getChildId(int parent, int child) {
        return child;
    }

    @Override
    public boolean hasStableIds() {
        return false;
    }

    @Override
    public View getGroupView(int parent, boolean isExpanded, View convertView, ViewGroup parentView) {
        String group_title = (String) getGroup(parent);
        if(convertView == null) {
            LayoutInflater inflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            convertView = inflater.inflate(R.layout.nav_drawer_parent, parentView, false);
        }
        ImageView imageView = (ImageView) convertView.findViewById(R.id.menu_icons);
        imageView.setImageResource(images[parent]);
        TextView parent_textview = (TextView) convertView.findViewById(R.id.parent_txt);
        parent_textview.setTypeface(null, Typeface.BOLD);
        parent_textview.setText(group_title);
        if(parent != 4) {
            convertView.findViewById(R.id.seperation).setVisibility(View.GONE);
        }
        return convertView;
    }

    @Override
    public View getChildView(int parent, int child, boolean isLastChild, View convertView, ViewGroup parentView) {
        String child_title = (String) getChild(parent, child);
        if(convertView == null) {
            LayoutInflater inflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            convertView = inflater.inflate(R.layout.nav_drawer_child, parentView, false);
        }
        TextView child_textview = (TextView) convertView.findViewById(R.id.child_txt);
        child_textview.setText(child_title);

        return convertView;
    }

    @Override
    public boolean isChildSelectable(int groupPosition, int childPosition) {
        return false;
    }

}
