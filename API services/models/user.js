const Sequelize = require('sequelize');
const sequelize=new Sequelize('drugdispenserdb','root','', {
    dialect: 'mysql'
});

const user1=sequelize.define('users',{
    Username:{
        type:Sequelize.STRING,
        primaryKey:true
    },
    Password:{
        type:Sequelize.STRING,
        allowNull:false,
    },
    UserType:{
        type:Sequelize.DataTypes.INTEGER,
        allowNull:false
    },
},
{
  timestamps: false,
  tablename: 'users'
})

// let testConnection = async function(){
//     try {
//     //   await sequelize.authenticate();
//     //   console.log('Connection has been established successfully.');
//       let actorLoaded = await user1.findAll();
//       console.log(actorLoaded);
//     } catch (error) {
//       console.error("Error log", error);
//     }
//   }
//   testConnection();

module.exports = user1;