package com.version_first.blackpearl.softnerveui;


import android.content.Context;
import android.content.res.Resources;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.TextView;

import java.util.ArrayList;


/**
 * A simple {@link Fragment} subclass.
 */
public class RoiFragment extends Fragment {

    ListView listView;
    public RoiFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View layout = inflater.inflate(R.layout.fragment_roi, container, false);
        listView = (ListView) layout.findViewById(R.id.roi_list);
        listView.setAdapter(new RoiListAdapter(getActivity()));
        return layout;
    }

}

class SingleRow {
    String title;
    String description;
    int image;
    SingleRow(String title, String description, int image) {
        this.title = title;
        this.description = description;
        this.image = image;
    }
}

class RoiListAdapter extends BaseAdapter {
    Context context;
    ArrayList<SingleRow> list;
    RoiListAdapter(Context c) {
        context = c;
        list = new ArrayList<SingleRow>();
        Resources resources = c.getResources();
        String[] titles = resources.getStringArray(R.array.roi_titles);
        String[] descriptions = resources.getStringArray(R.array.roi_description);
        int[] images = {R.drawable.roi1, R.drawable.roi2, R.drawable.roi3, R.drawable.roi4};
        for(int i=0;i<4;i++) {
            list.add(new SingleRow(titles[i], descriptions[i], images[i]));
        }
    }

    @Override
    public int getCount() {
        return list.size();
    }

    @Override
    public Object getItem(int position) {
        return list.get(position);
    }

    @Override
    public long getItemId(int position) {
        return position;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        LayoutInflater inflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
        View row = inflater.inflate(R.layout.roi_single_row, parent, false);

        TextView title = (TextView) row.findViewById(R.id.roi_title);
        TextView description = (TextView) row.findViewById(R.id.roi_description);
        ImageView imageView = (ImageView) row.findViewById(R.id.roi_image);

        SingleRow temp = list.get(position);
        title.setText(temp.title);
        description.setText(temp.description);
        imageView.setImageResource(temp.image);

        return row;
    }
}
