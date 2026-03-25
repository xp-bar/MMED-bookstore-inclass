
# rest api

What are they?
They are the standard for API implementaitons on the web

REST = REpresentational State Transfer 
API = Application Programming Interface


## What princimapls does REST implement (is my application considered RESTful?)
Client-Server Architechture
- "Client" as in a piece of software, not someone who pays you
- A seperated "client" (web browser, Postman, etc) and a "server" that act and can be developed independently
Statelessness*
- Each request contains ALL the information needed to perfrom whatever action it is trying to accomplish; it CANNOT use any leftover or stored data from a previous request.
- This is _different_ from storing stuff in a database, databases are not considered "state" for an API
Cacheability
- Responses can be cached (stored temporarily for performance)
Uniform Interface*
- API URLS and endpoints follow a standard convention / format. 
Layered System
- Clients (not people who pay you) cannot determine if they are directly connected to the server or if they have gone through one or more intermediaries 
Code on Demand
- Servers can _optionally_ send code that can be executed.

