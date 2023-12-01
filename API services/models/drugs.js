const Sequelize = require('sequelize');
const sequelize=new Sequelize('drugdispenserdb','root','', {
    dialect: 'mysql'
});

const drug=sequelize.define('drugs',{
    TradeName:{
        type:Sequelize.STRING,
        primaryKey:true
    },
    Formula:{
        type:Sequelize.STRING,
        allowNull:false,
    },
    CompanyID:{
        type:Sequelize.DataTypes.INTEGER,
        allowNull:false
    },
    dcategory:{
        type:Sequelize.DataTypes.STRING,
        allowNull:false
    },
    folder:{
        type:Sequelize.DataTypes.STRING,
        allowNull:false
    }
},
{
  timestamps: false,
  tablename: 'drugs'
})

// let testConnection = async function(){
//     try {
//     //   await sequelize.authenticate();
//     //   console.log('Connection has been established successfully.');
//       let actorLoaded = await drug.findAll({ where: { TradeName: 'panadol' },raw:true})
//       .then((user) => {
//         if (user) {
//           // Access the specific columns
//           console.log(user.Formula);
//           console.log(user);
    
//           // Check if the username is 'exampleUsername'
//           if (user.TradeName === 'panadol') {
//             console.log(1);
//           } else {
//             console.log(0);
//           }
//         } else {
//           console.log('User not found');
//         }
//       })
//       .catch((error) => {
//         console.error('Error:', error);
//       });;
//       //console.log(actorLoaded);
//       //if(drug.TradeName=='panadol'){
//       //  console.log("CompanyID is 1");
//       //}
//     } catch (error) {
//       console.error("Error log", error);
//     }
//   }
//   testConnection();

module.exports = drug;