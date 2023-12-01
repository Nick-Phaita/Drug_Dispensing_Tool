const Sequelize = require('sequelize');
const sequelize=new Sequelize('drugdispenserdb','root','', {
    dialect: 'mysql'
});

const patient1=sequelize.define('patients',{
    SSN:{
        type:Sequelize.INTEGER,
        primaryKey:true
    },
    Names:{
        type:Sequelize.STRING,
        allowNull:false,
    },
    Gender:{
        type:Sequelize.DataTypes.INTEGER,
        allowNull:false
    },
    Allergies:{
        type:Sequelize.DataTypes.STRING,
        allowNull:true
    },
    HeightinCm:{
        type:Sequelize.DataTypes.INTEGER,
        allowNull:true
    },
    WeightinKg:{
        type:Sequelize.DataTypes.INTEGER,
        allowNull:true
    },
    PatientAddress:{
        type:Sequelize.DataTypes.STRING,
        allowNull:true
    },
    DateOfBirth:{
        type:Sequelize.DataTypes.DATE,
        allowNull:false
    },
    Username:{
        type:Sequelize.DataTypes.STRING,
        allowNull:false
    },
    PrimaryPhysicianSSN:{
        type:Sequelize.DataTypes.INTEGER,
        allowNull:true
    },
    lastlogin:{
        type:Sequelize.DataTypes.DATE,
        allowNull:true,
    }
},
{
  timestamps: false,
  tablename: 'patients'
})

//  let testConnection = async function(){
//     try {
//   await sequelize.authenticate();
//   console.log('Connection has been established successfully.');
//        let actorLoaded = await patient1.findAll();
//        console.log(actorLoaded);
//      } catch (error) {
//        console.error("Error log", error);
//      }
//    }
//    testConnection();

module.exports = patient1;