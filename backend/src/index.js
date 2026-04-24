const express = require('express') // ambil library express + require (import di js)
const app = express() // inisialisasi app dengan express
const dotenv = require('dotenv');
dotenv.config();
const PORT = process.env.PORT; // mengugnakan port 3000



app.get('/', (req, res)=> {
  res.send('Aku PTI UB')
}) // request GET

app.listen(PORT, ()=>{
  console.log(`listening port : ` + PORT);
}) // respond 

