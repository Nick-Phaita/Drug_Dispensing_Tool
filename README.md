# Drug_Dispensing_Tool

Requirements

1.Patients have : SSN , Name ,gender, allergies , height , weight ,  Addresses and ages
2.Doctors have : SSN , Name , Speciality and years of experience
3.Pharmaceutical Company have :CompanyID, Name and Phone number
4.Pharmacy have : Name , Address and Phone number
5.Drug have : Trade name, Expiration date , CompanyID and formula .Each drug is specific to a certain pharmaceutical company.When a company is deleted ,its products are no longer tracked
6.Every patient has one primary doctor but every doctor doctor has at least on patient
7.Each pharmacy has several drugs and the price of drugs for each pharmacy varies.
8.A doctor prescribes drugs for patients with which a doctor prescribe one or more drugs for several patients and a patient can get prescriptions from several doctors
9.A pharmaceutical company have long time contracts with pharmacies.A pharmacy can contract with several pharmaceutical companies
10.Pharmacies appoint a supervisor for each contract
11.A stock of all the drugs available to each pharmacy which include:stock number, Trade name and expiration date , quantity , companyID
12.A four user system who are: Doctor, Patient, Pharmacy and Admin
13.A Supervisor have:SSN, Name 
14.A prescription have : PrescripID, Date of issue , Drug name , Quantity , type and administering form 
