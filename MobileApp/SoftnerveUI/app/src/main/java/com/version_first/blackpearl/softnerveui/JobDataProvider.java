package com.version_first.blackpearl.softnerveui;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.LinkedHashMap;
import java.util.List;

/**
 * Created by Black Pearl on 7/7/2016.
 */
public class JobDataProvider {

    public static LinkedHashMap<String, List<String>> getInfo(String job){
        LinkedHashMap<String, List<String>> jobContent = new LinkedHashMap<String, List<String>>();
        List<String> Experience = new ArrayList<String>();
        List<String> Qualification = new ArrayList<String>();
        List<String> JobLocation = new ArrayList<String>();
        List<String> KeyDeliverables = new ArrayList<String>();
        if(job == "UX Design")
        {
            Experience.add("2 to 4 year's.");
            Qualification.add("NID or Top Design College Pass-out.");
            JobLocation.add("Pithoragarh (Uttaranchal)– Engineering Development Center.");
            KeyDeliverables.add("Out of Box and Great Product Designing Skills.");
            KeyDeliverables.add("Imaginative and Aspire to deliver WOW experience to User.");
            KeyDeliverables.add("Well Versed with the Software and Work flow designing Tools");
        } else if(job == "Software Design")
        {
            Experience.add("2 to 4 year's.");
            Qualification.add("B.E/ B.Tech./ M.Tech/ M.S from Top Institute.");
            JobLocation.add("Pithoragarh (Uttaranchal)– Engineering Development Center.");
            KeyDeliverables.add("Sharp Technological Skills.");
            KeyDeliverables.add("Out of box and passionate to delivery results.");
            KeyDeliverables.add("Good analytical and problem solving Skills.");
        } else if(job == "Business Development")
        {
            Experience.add("5 to 8 year's.");
            Qualification.add("MBA from top Business School (MARKETING).");
            JobLocation.add("New Delhi");
            KeyDeliverables.add("Sharp Business ,Communication and Presentations skills.");
            KeyDeliverables.add("Result oriented Marketing Professional with go getter attitude.");
            KeyDeliverables.add("Good Sales and negotiation Skills.");
            KeyDeliverables.add("Designing Marketing plan and Business strategies.");
            KeyDeliverables.add("Past track record on selling Product and Services.");
        } else if(job == "Online Marketing")
        {
            Experience.add("5 to 8 year's.");
            Qualification.add("MBA from Top Business School.");
            JobLocation.add("New Delhi");
            KeyDeliverables.add("Track record on running successful on-line digital marketing campaigns with start up or Products.");
            KeyDeliverables.add("Track record in Managing on-line digital Campaign of significant value.");
            KeyDeliverables.add("Result oriented Marketing Professional with go getter attitude.");
            KeyDeliverables.add("Good in Designing on-line marketing campaigns for Software products and services.");
            KeyDeliverables.add("Sharp Business and Communication skills.");
        } else if(job == "Health Care")
        {
            Experience.add("2 to 3 year's.");
            Qualification.add("Medico Professional.");
            JobLocation.add("New Delhi");
            KeyDeliverables.add("Result oriented Medico Professional work on Various Medical Trail.");
        }

        jobContent.put("Experience", Experience);
        jobContent.put("Qualification", Qualification);
        jobContent.put("Job Location", JobLocation);
        jobContent.put("Key Deliverables", KeyDeliverables);

        return jobContent;
    }

}
