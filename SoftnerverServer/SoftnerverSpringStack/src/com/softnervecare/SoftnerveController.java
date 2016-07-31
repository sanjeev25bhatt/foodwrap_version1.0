package com.softnervecare;

import java.awt.image.BufferedImage;
import java.io.ByteArrayOutputStream;
import java.io.File;
import java.io.IOException;
import java.io.InputStream;
import java.net.URL;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import javax.imageio.ImageIO;

import org.apache.naming.resources.Resource;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.ApplicationContext;
import org.springframework.http.ResponseEntity;
import org.springframework.scheduling.annotation.Scheduled;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.servlet.ModelAndView;

import com.softnerveDataModel.SoftnerveDoctorList;
import com.softnerveDataModel.SoftnerveMedicineDetails;
import com.softnerveDataModel.SoftnerverSpecialities;

@Controller
@RequestMapping("/softnervecontroller")
public class SoftnerveController {

	Map<String, List<SoftnerveDoctorList>> _mMapObject = null;
	SoftnerveDoctorList _localDocObj = null;
	@Autowired
	private ApplicationContext appContext;
	
	// http://localhost:8080/SoftnerverSpringStack/softnervecontroller/hello
	@RequestMapping(method = RequestMethod.GET, value = "/hello")
	public ModelAndView printHello() {
		ModelAndView model = new ModelAndView("hello");
		model.addObject("message", "Hello SoftnerverSpringStack Spring MVC Stack!");
		return model;
	}

	// http://localhost:8080/SoftnerverSpringStack/softnervecontroller/getdoctorDetails
	@RequestMapping(method = RequestMethod.GET, value = "/getdoctorDetails", headers = "Accept=application/json")
	@ResponseBody
	public Map<String, List<SoftnerveDoctorList>> getDoctorDetails() {

		System.out.println("inside getDoctorFinder --->");

		List<SoftnerveDoctorList> alocalObject = new ArrayList<SoftnerveDoctorList>();
		_mMapObject = new HashMap<String, List<SoftnerveDoctorList>>();

		// Details starts here
		_localDocObj = new SoftnerveDoctorList();
		_localDocObj.setmName("Dr. Sangeeta Bhatt");
		_localDocObj.setmDegree("M.S. BHMS M.D.");
		_localDocObj.setmSpecialization("Gynic");
		_localDocObj.setmExperience("20 years");
		_localDocObj.setmPreviousRecord("28K satisfied people");
		_localDocObj.setAddress("Preet Vihar");
		_localDocObj.setmPhoneNumber("8447925460");
		alocalObject.add(_localDocObj);

		_localDocObj = new SoftnerveDoctorList();
		_localDocObj.setmName("Dr. Krishan Murti");
		_localDocObj.setmDegree("M.S. MBBS");
		_localDocObj.setmSpecialization("Opthalmologist");
		_localDocObj.setmExperience("10 years");
		_localDocObj.setmPreviousRecord("18K satisfied people");
		_localDocObj.setAddress("LaxmiNagar");
		_localDocObj.setmPhoneNumber("9718685249");
		alocalObject.add(_localDocObj);

		_localDocObj = new SoftnerveDoctorList();
		_localDocObj.setmName("Dr. Rohan Sarkaar");
		_localDocObj.setmDegree("M.S. M.D.");
		_localDocObj.setmSpecialization("Dentist");
		_localDocObj.setmExperience("15 years");
		_localDocObj.setmPreviousRecord("10K satisfied people");
		_localDocObj.setAddress("Shipra Sun City");
		_localDocObj.setmPhoneNumber("7042080431");
		alocalObject.add(_localDocObj);

		alocalObject.add(_localDocObj);
		_localDocObj = new SoftnerveDoctorList();
		_localDocObj.setmName("Dr. Tika Ram");
		_localDocObj.setmDegree("Diploma");
		_localDocObj.setmSpecialization("General Physician");
		_localDocObj.setmExperience("1 years");
		_localDocObj.setmPreviousRecord("18K satisfied people");
		_localDocObj.setAddress("Mayur Vihar");
		_localDocObj.setmPhoneNumber("0000000000");
		alocalObject.add(_localDocObj);

		_localDocObj = new SoftnerveDoctorList();
		_localDocObj.setmName("Dr. Sia Ram");
		_localDocObj.setmDegree("M.S. BHMS");
		_localDocObj.setmSpecialization("Homeologist");
		_localDocObj.setmExperience("10 years");
		_localDocObj.setmPreviousRecord("88K satisfied people");
		_localDocObj.setmPhoneNumber("0000000000");
		_localDocObj.setAddress("Vasant Vihar");

		alocalObject.add(_localDocObj);
		_localDocObj = new SoftnerveDoctorList();
		_localDocObj.setmName("Dr. Ramu");
		_localDocObj.setmDegree("B.A. Pass");
		_localDocObj.setmSpecialization("Malham Patti");
		_localDocObj.setmExperience("1 years");
		_localDocObj.setmPreviousRecord("1 satisfied people");
		_localDocObj.setmPhoneNumber("0000000000");
		_localDocObj.setAddress("Rajiv Chowk");

		// Details end here

		_mMapObject.put(SoftnerveMvcConstFile.TAG_PARENT, alocalObject);

		return _mMapObject;
	}

	// http://localhost:8080/SoftnerverSpringStack/softnervecontroller/getdoctordetails?aKey=findNearDoctor&lat=10&lon=104

	@RequestMapping(method = RequestMethod.GET, value = "/getdoctordetails", headers = "Accept=application/json")
	@ResponseBody

	public Map<String, List<SoftnerveDoctorList>> getdoctordetails(@RequestParam String aKey, @RequestParam String lat,
			@RequestParam String lon) {

		System.out.println(aKey.contains("findNearDoctor"));
		if (aKey.contains("findNearDoctor")) {

			List<SoftnerveDoctorList> alocalObject = new ArrayList<SoftnerveDoctorList>();
			_mMapObject = new HashMap<String, List<SoftnerveDoctorList>>();

			// Details starts here
			_localDocObj = new SoftnerveDoctorList();
			_localDocObj.setmName("Dr. Sangeeta Bhatt");
			_localDocObj.setmDegree("M.S. BHMS M.D.");
			_localDocObj.setmSpecialization("Gynic");
			_localDocObj.setmExperience("20 years");
			_localDocObj.setmPreviousRecord("28K satisfied people");
			_localDocObj.setAddress("Preet Vihar");
			_localDocObj.setmPhoneNumber("8447925460");
			alocalObject.add(_localDocObj);

			_localDocObj = new SoftnerveDoctorList();
			_localDocObj.setmName("Dr. Krishan Murti");
			_localDocObj.setmDegree("M.S. MBBS");
			_localDocObj.setmSpecialization("Opthalmologist");
			_localDocObj.setmExperience("10 years");
			_localDocObj.setmPreviousRecord("18K satisfied people");
			_localDocObj.setAddress("LaxmiNagar");
			_localDocObj.setmPhoneNumber("9718685249");
			alocalObject.add(_localDocObj);

			_localDocObj = new SoftnerveDoctorList();
			_localDocObj.setmName("Dr. Rohan Sarkaar");
			_localDocObj.setmDegree("M.S. M.D.");
			_localDocObj.setmSpecialization("Dentist");
			_localDocObj.setmExperience("15 years");
			_localDocObj.setmPreviousRecord("10K satisfied people");
			_localDocObj.setAddress("Shipra Sun City");
			_localDocObj.setmPhoneNumber("7042080431");
			alocalObject.add(_localDocObj);

			alocalObject.add(_localDocObj);
			_localDocObj = new SoftnerveDoctorList();
			_localDocObj.setmName("Dr. Tika Ram");
			_localDocObj.setmDegree("Diploma");
			_localDocObj.setmSpecialization("General Physician");
			_localDocObj.setmExperience("1 years");
			_localDocObj.setmPreviousRecord("18K satisfied people");
			_localDocObj.setAddress("Mayur Vihar");
			_localDocObj.setmPhoneNumber("0000000000");
			alocalObject.add(_localDocObj);

			_localDocObj = new SoftnerveDoctorList();
			_localDocObj.setmName("Dr. Sia Ram");
			_localDocObj.setmDegree("M.S. BHMS");
			_localDocObj.setmSpecialization("Homeologist");
			_localDocObj.setmExperience("10 years");
			_localDocObj.setmPreviousRecord("88K satisfied people");
			_localDocObj.setmPhoneNumber("0000000000");
			_localDocObj.setAddress("Vasant Vihar");

			alocalObject.add(_localDocObj);
			_localDocObj = new SoftnerveDoctorList();
			_localDocObj.setmName("Dr. Ramu");
			_localDocObj.setmDegree("B.A. Pass");
			_localDocObj.setmSpecialization("Malham Patti");
			_localDocObj.setmExperience("1 years");
			_localDocObj.setmPreviousRecord("1 satisfied people");
			_localDocObj.setmPhoneNumber("0000000000");
			_localDocObj.setAddress("Rajiv Chowk");

			// Details end here

			_mMapObject.put(SoftnerveMvcConstFile.TAG_PARENT, alocalObject);

		}

		System.out.println("Object details " + _mMapObject);
		return _mMapObject;

	}

	// http://localhost:8080/SoftnerverSpringStack/softnervecontroller/gethospitaldetails?aKey=findNearByHospital&lat=10&lon=10
	@RequestMapping(method = RequestMethod.GET, value = "/gethospitaldetails", headers = "Accept=application/json")
	@ResponseBody

	public Map<String, List<SoftnerveDoctorList>> getHospitalDetails(@RequestParam String aKey,
			@RequestParam String lat, @RequestParam String lon) {

		System.out.println("inside getHospitalDetails --->");

		if (aKey.contains("findNearByHospital")) {

			List<SoftnerveDoctorList> localListObject = new ArrayList<SoftnerveDoctorList>();
			Map mapObject = new HashMap<String, List<SoftnerveDoctorList>>();

			// Details starts here
			SoftnerveDoctorList localDocObj = new SoftnerveDoctorList();
			localDocObj.setmName("Dr. Sangeeta Bhatt");
			localDocObj.setmDegree("M.S. BHMS M.D.");
			localDocObj.setmSpecialization("Gynic");
			localDocObj.setmExperience("20 years");
			localDocObj.setmPreviousRecord("28K satisfied people");
			localDocObj.setAddress("Preet Vihar");
			localDocObj.setmPhoneNumber("8447925460");
			localListObject.add(localDocObj);

			localDocObj = new SoftnerveDoctorList();
			localDocObj.setmName("Dr. Krishan Murti");
			localDocObj.setmSpecialization("Opthalmologist");
			localDocObj.setmExperience("10 years");
			localDocObj.setmPreviousRecord("18K satisfied people");
			localDocObj.setAddress("LaxmiNagar");
			localDocObj.setmPhoneNumber("9718685249");
			localListObject.add(localDocObj);

			localDocObj = new SoftnerveDoctorList();
			localDocObj.setmName("Dr. Rohan Sarkaar");
			localDocObj.setmDegree("M.S. M.D.");
			localDocObj.setmSpecialization("Dentist");
			localDocObj.setmExperience("15 years");
			localDocObj.setmPreviousRecord("10K satisfied people");
			localDocObj.setAddress("Shipra Sun City");
			localDocObj.setmPhoneNumber("7042080431");
			localListObject.add(localDocObj);

			localDocObj = new SoftnerveDoctorList();
			localDocObj.setmName("Dr. Tika Ram");
			localDocObj.setmDegree("Diploma");
			localDocObj.setmSpecialization("General Physician");
			localDocObj.setmExperience("1 years");
			localDocObj.setmPreviousRecord("18K satisfied people");
			localDocObj.setAddress("Mayur Vihar");
			localDocObj.setmPhoneNumber("0000000000");
			localListObject.add(localDocObj);

			localDocObj = new SoftnerveDoctorList();
			localDocObj.setmName("Dr. Sia Ram");
			localDocObj.setmDegree("M.S. BHMS");
			localDocObj.setmSpecialization("Homeologist");
			localDocObj.setmExperience("10 years");
			localDocObj.setmPreviousRecord("88K satisfied people");
			localDocObj.setmPhoneNumber("0000000000");
			localDocObj.setAddress("Vasant Vihar");
			localListObject.add(localDocObj);

			localDocObj = new SoftnerveDoctorList();
			localDocObj.setmName("Dr. Ramu");
			localDocObj.setmDegree("B.A. Pass");
			localDocObj.setmSpecialization("Malham Patti");
			localDocObj.setmExperience("1 years");
			localDocObj.setmPreviousRecord("1 satisfied people");
			localDocObj.setmPhoneNumber("0000000000");
			localDocObj.setAddress("Rajiv Chowk");
			localListObject.add(localDocObj);
			// Details end here

			mapObject.put(SoftnerveMvcConstFile.TAG_PARENT, localListObject);

			return mapObject;
		} else
			return null;

	}

	// http://localhost:8080/SoftnerverSpringStack/softnervecontroller/getmedicinedetails?aKey=paracetemol
	@RequestMapping(method = RequestMethod.GET, value = "/getmedicinedetails", headers = "Accept=application/json")
	@ResponseBody
	public Map<String, List<SoftnerveMedicineDetails>> getMedicineDetails(@RequestParam String aKey) {

		System.out.println("inside getMedicineDetails --->");

		if (aKey.equalsIgnoreCase("paracetemol")) {

			List<SoftnerveMedicineDetails> localListObject = new ArrayList<SoftnerveMedicineDetails>();
			Map mapObject = new HashMap<String, List<SoftnerveMedicineDetails>>();

			SoftnerveMedicineDetails localMediobject = new SoftnerveMedicineDetails();
			localMediobject.setMedicineName("paracetemol");
			localMediobject.setMedicineDescrip("Medicine is used in fever");
			localMediobject.setMedicinePrice("10 RS");

			localListObject.add(localMediobject);

			mapObject.put(SoftnerveMvcConstFile.TAG_PARENT, localListObject);

			return mapObject;
		} else
			return null;
	}

	// http://localhost:8080/SoftnerverSpringStack/softnervecontroller/getspecialities?aKey=Dermatologist
	@RequestMapping(method = RequestMethod.GET, value = "/getspecialities", headers = "Accept=application/json")
	@ResponseBody
	public Map<String, List<SoftnerveMedicineDetails>> getSpecialities(@RequestParam String aKey) {

		System.out.println("inside getSpecialities --->");

		List<SoftnerverSpecialities> localListObject = new ArrayList<SoftnerverSpecialities>();
		Map mapObject = new HashMap<String, List<SoftnerverSpecialities>>();
		if (aKey.equalsIgnoreCase("Dermatologist")) {

			SoftnerverSpecialities localMediobject = new SoftnerverSpecialities();
			localMediobject.setSpecialitestype(aKey);
			localMediobject.setSpecialitiesDetails("Skin Care Details");

			SoftnerveDoctorList localDocObj = new SoftnerveDoctorList();
			localDocObj.setmName("Dr. Sangeeta Bhatt");
			localDocObj.setmDegree("M.S. BHMS M.D.");
			localDocObj.setmSpecialization("Gynic");
			localDocObj.setmExperience("20 years");
			localDocObj.setmPreviousRecord("28K satisfied people");
			localDocObj.setAddress("Preet Vihar");
			localDocObj.setmPhoneNumber("8447925460");

			localMediobject.setConsultingDoctor((Object) localDocObj);

			localDocObj = new SoftnerveDoctorList();
			localDocObj.setmName("Dr. Krishan Murti");
			localDocObj.setmSpecialization("Opthalmologist");
			localDocObj.setmExperience("10 years");
			localDocObj.setmPreviousRecord("18K satisfied people");
			localDocObj.setAddress("LaxmiNagar");
			localDocObj.setmPhoneNumber("9718685249");

			localMediobject.setConsultingDoctor(localDocObj);

			localListObject.add(localMediobject);

			mapObject.put(SoftnerveMvcConstFile.TAG_PARENT, localListObject);

			return mapObject;
		} else
			return null;
	}

	//http://localhost:8080/SoftnerverSpringStack/softnervecontroller/getimage?aImageName=images1.jpg
	@RequestMapping(value = "/getimage", method = RequestMethod.GET, produces = "image/jpg")
	public @ResponseBody byte[] getImage(@RequestParam String aImageName) {
		System.out.println("getImage >>>>>>>>>..");
		
		
		
		org.springframework.core.io.Resource resource = appContext.getResource("file:C:\\xampp\\tomcat\\webapps\\Photos\\" + aImageName);
		
		InputStream xx = null;
		try {
			xx = resource.getInputStream();
		} catch (IOException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		}
	
		try {
			BufferedImage img = ImageIO.read(xx);
		
			ByteArrayOutputStream bao = new ByteArrayOutputStream();
			ImageIO.write(img, "jpg", bao);

			return bao.toByteArray();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	//	demoServiceMethod();	
		return null;

	}
	
	
}