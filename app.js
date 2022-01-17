const express=require('express')
const app=express()
const mysql=require('mysql')

const port=process.env.port || 3000

//Connection
const connection=mysql.createConnection({
    host: 'eu-cdbr-west-02.cleardb.net',
    user:'b213ccb775d415',
    password:'21d23908',
    database: 'heroku_cf82f1357cd4913'
})


//View engine
app.set('view engine', 'ejs')



//Render Homepage 
app.get('/', function(req, res) {
 
connection.query('SELECT*FROM user WHERE id="1"', (error, rows)=>{

    if(error) throw error

    if(!error) {
        console.log(rows)
        res.render('pages/index', {rows})
    }
    
    })  
})

app.listen(port)
console.log(`Server is listening on port ${port}`);


