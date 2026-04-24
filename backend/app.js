const express = require('express') // ambil library express + require (import di js)
const app = express() // inisialisasi app dengan express
const port = 3000 // mengugnakan port 3000

app.get('/', (req, res)=> {
  res.send('Aku PTI UB')
}) // request GET

app.listen(port, ()=>{
  console.log(`listening port : ${port}`)
}) // respond 
