const express = require('express');
const app = express();
const mysql = require('mysql2');
const cookieParser = require('cookie-parser');

const bcrypt = require("bcrypt");
const User=require('./models/index');
const drug=require('./models/drugs');
const prescription=require('./models/prescription');
const user1=require('./models/user');

const {createAccessToken, validateToken}=require('./JWT');
const patient1 = require('./models/patient');


app.use(express.json());
app.use(cookieParser());



const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'drugdispenserdb'
});

try{
    connection.connect();
    console.log('Connected successfully');
}
catch(e){
    console.log('Oops. Connection to MYSQL failed.');
    console.log(e);
}

app.post("/register", (req, res) => {
    const { name, password,gender,role } = req.body;
    
        User.create({
            name: name,
            password: password,
            gender:gender,
            role:role
          })

      
        .then(() => {
          res.json("USER REGISTERED");
        })
        .catch((err) => {
          if (err) {
            res.status(400).json({ error: err });
          }
        });
    
  });

app.post("/login", async (req, res) => {
  const { name, password } = req.body;

  const user=await  User.findOne({ where: { name: name ,password: password} });

  if(!user){
    res.status(400).json({ error: "User does not exist" });
  }else{
    const userPassword=user.password;
    const accessToken=createAccessToken(user);

    res.cookie("access-token",accessToken,{
      maxAge: 600000
    });

    res.json("USER LOGGED IN");

    User.update({changer:1},{where:{name:name,password:password}});
  }
});

app.get("/apiuser",validateToken, async (req,res)=>{
  const user=await  User.findAll();

  if(user.length==0){
    res.status(400).json({ error: "There are no users" });
  }else{
    res.json(user);
  }
});

app.get("/apiuser/:id",validateToken, async (req,res)=>{
  const {name}=req.body;

  const id=req.params.id;
  const user=await  User.findAll({ where: { user_id: id } });

  const perm=await User.findAll({where:{name:name,role:"admin"}});
  if(perm.length==0){
    res.status(400).json({ error: "You are not an admin" });
  }else{

  if(user.length==0){
    res.status(400).json({ error: "User does not exist" });
  }else{
    res.json(user);
  }}
});

app.get("/apiuser/sort/:gender",validateToken, async (req,res)=>{
  const {name}=req.body;

  const gender=req.params.gender;
  const user=await  User.findAll({ where: { gender: gender } });

  if(user.length==0){
    res.status(400).json({ error: "Users does not exist" });
  }else{
    const perm=await User.findAll({where:{name:name,role:"admin"}});
  if(perm.length==0){
    res.status(400).json({ error: "You are not an admin" });
  }else{
    res.json(user);
  }}
});



app.get("/api-logintime",validateToken, async (req,res)=>{
  const user5=await  User.findAll({ order: [['updatedAt', 'DESC']]});

  if(user5.length==0){
    res.status(400).json({ error: "User does not exist" });
  }else{
    res.json(user5);
  }
});

app.get("/user",validateToken, async (req,res)=>{
  const user=await  patient1.findAll();

  if(user.length==0){
    res.status(400).json({ error: "There are no users" });
  }else{
    res.json(user);
  }
});

app.get("/user/:id",validateToken, async (req,res)=>{

  const id=req.params.id;
  const user=await  patient1.findAll( { where: { SSN: id } });

  if(user.length==0){
    res.status(400).json({ error: "User does not exist" });
  }else{
    res.json(user);
  }
});

app.get("/user/sort/:gender",validateToken, async (req,res)=>{

  const gender=req.params.gender;
  const user=await  patient1.findAll({ where: { gender: gender } });

  if(user.length==0){
    res.status(400).json({ error: "Users does not exist" });
  }else{
    res.json(user);
  }
});

app.get("/user/logintime",validateToken, async (req,res)=>{

  const user=await  patient1.findAll({ order: [['updatedAt', 'DESC']]});

  if(!person){
    res.status(400).json({ error: "User does not exist" });
  }else{
    res.json(user);
  }
});



app.get("/drug", async (req,res)=>{

  const drugs=await  drug.findAll();

  if(drugs.length==0){
    res.status(400).json({ error: "Drug does not exist" });
  }else{
    res.json(drugs);
  }
});

app.get("/drug/:Tradename", async (req,res)=>{
  const Tradename=req.params.Tradename;
  const drugs=await  drug.findAll({ where: { TradeName: Tradename }});

  if(drugs.length==0){
    res.status(400).json({ error: "Drug doesn't exist" });
  }else{
    res.json(drugs);
  }
});

app.get("/drug/category/:category", async (req,res)=>{
  const category=req.params.category;
  const drugs=await  drug.findAll({ where: { dcategory: category }});

  if(drugs.length==0){
    res.status(400).json({ error: "category doesnt exist" });
  }else{
    res.json(drugs);
  }
});

app.get("/patient/:date",validateToken , async (req,res)=>{
  const date=req.params.date; 
  const prescriptions=await  prescription.findAll({ where: {  PrescriptionDate: date }});

  if(prescriptions.length==0){
    res.json({ error: "No prescriptions given" });
  }else{
    res.json(prescriptions);
  }
});

app.get("/patient/name/:name",validateToken , async (req,res)=>{
  const name=req.params.name;
  const prescriptions=await  prescription.findAll({ where: { TradeName: name }});

  if(prescriptions.length==0){
    res.status(400).json({ error: "No prescriptions given" });
  }else{
    res.json(prescriptions);
  }
});

app.get("/patient/drug/:patient", validateToken, async(req, res) => {
  const patient = req.params.patient;
  const prescriptions = await prescription.findAll({where: { PatientSSN: patient }});

  if(prescriptions.length==0){
    res.status(400).json({error: "No prescriptions given"});
  }else{
    res.json(prescriptions);
  }
});

app.get("/web_user",validateToken , async (req,res)=>{
  const users=await  user1.findAll();

  if(users.length==0){
    res.status(400).json({ error: "No web_users" });
  }else{
    res.json(users);
  }
});


app.use(express.static(__dirname + '/public'));
app.listen(3000, ()=> {
    console.log("API up and running.");
});