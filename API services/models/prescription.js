const Sequelize = require('sequelize');
const sequelize=new Sequelize('drugdispenserdb','root','', {
    dialect: 'mysql'
});

const prescription=sequelize.define('prescriptions',{
    PrescriptionID:{
        type:Sequelize.STRING,
        primaryKey:true
    },
    TradeName:{
        type:Sequelize.STRING,
        allowNull:false,
    },
    Quantity:{
        type:Sequelize.DataTypes.STRING,
        allowNull:false
    },
    DoctorSSN:{
        type:Sequelize.DataTypes.INTEGER,
        allowNull:false
    },
    PatientSSN:{
        type:Sequelize.DataTypes.INTEGER,
        allowNull:false
    },
    Instructions:{
        type:Sequelize.DataTypes.STRING,
        allowNull:false
    },
    PrescriptionDate:{
        type:Sequelize.DataTypes.DATEONLY,
        allowNull:false
    },
},
{
  timestamps: false,
  tablename: 'prescriptions'
})

// 

module.exports = prescription;