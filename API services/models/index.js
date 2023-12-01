const Sequelize = require('sequelize');
const sequelize=new Sequelize('drugdispenserdb','root','', {
    dialect: 'mysql'
});

const User=sequelize.define('api_user',{
    user_id:{
        type:Sequelize.INTEGER,
        autoIncrement:true,
        primaryKey:true
    },
    name:{
        type:Sequelize.STRING,
        allowNull:false,
        unique:true
    },
    password:{
        type:Sequelize.DataTypes.STRING,
        allowNull:false
    },
    gender:{
        type:Sequelize.DataTypes.STRING,
        allowNull:false
    },
    changer:{
        type:Sequelize.DataTypes.INTEGER,
        allowNull:false,
        defaultValue:1
    },
    role:{
        type:Sequelize.DataTypes.STRING,
        allowNull:false,
        defaultValue:"user"
    },
},
{
  timestamps: true,
  freezeTableName: true
})

// User.sync({ force: true }).then(() => {
//   console.log("User table created");

// })


module.exports = User;