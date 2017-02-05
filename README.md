Yii 2 Advanced Project Template

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2-app-advanced/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://poser.pugx.org/yiisoft/yii2-app-advanced/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

=======

OVERVIEW

This API allows you to use basic HTTP Methods to interact with the database. The RESTful api allows us to retrieve, update, delete and create information.

FORMATS

The data is received as JSON and sent urlencoded.

AUTHENTICATION

The API uses HTTP basic access authentication. The following data need to be sent as headers to facilitate authentication
user_id: 101
access_token: 4p9mj82PTl1BWSya7bfpU_Nm8u07hkcB

INDEX

Loans

GET /loans: list all loans
HEAD /loans: show the overview information of loan listing
POST /loans: create a new loan
GET /loans/12345: return the details of the loan 12345
GET /loans/12345/borrowers: return the borrower details of the loan 12345
HEAD /loans/12345: show the overview information of loan 12345
PATCH /loans/12345: update the loan 12345
PUT /loans/12345: update the loan 12345
DELETE /loans/12345: delete the loan 12345
OPTIONS /loans: show the supported verbs regarding endpoint /loans
OPTIONS /loans/12345: show the supported verbs regarding endpoint /loans/12345

Borrowers

GET /borrowers: list all borrowers
HEAD /borrowers: show the overview information of borrower listing
POST /borrowers: create a new borrower
GET /borrowers/10001: return the details of the borrower 10001
GET /borrowers/10001/type: return the type of loan details of the borrower 10001
HEAD /borrowers/10001: show the overview information of borrower 10001
PATCH /borrowers/10001: update the borrower 10001
PUT /borrowers/10001: update the borrower 10001
DELETE /borrowers/10001: delete the borrower 10001
OPTIONS /borrowers: show the supported verbs regarding endpoint /borrowers
OPTIONS /borrowers/10001: show the supported verbs regarding endpoint /borrowers/10001.

Education

GET /educations: list all educations
HEAD /educations: show the overview information of education listing
POST /educations: create a new education
GET /educations/12345: return the details of the education 12345
HEAD /educations/12345: show the overview information of education 12345
PATCH /educations/12345: update the education 12345
PUT /educations/12345: update the education 12345
DELETE /educations/12345: delete the education 12345
OPTIONS /educations: show the supported verbs regarding endpoint /educations
OPTIONS /educations/12345: show the supported verbs regarding endpoint /educations/12345.

Property

GET /propertys: list all propertys
HEAD /propertys: show the overview information of property listing
POST /propertys: create a new property
GET /propertys/12345: return the details of the property 12345
HEAD /propertys/12345: show the overview information of property 12345
PATCH /propertys/12345: update the property 12345
PUT /propertys/12345: update the property 12345
DELETE /propertys/12345: delete the property 12345
OPTIONS /propertys: show the supported verbs regarding endpoint /propertys
OPTIONS /propertys/12345: show the supported verbs regarding endpoint /propertys/12345.

Vehicle

GET /vehicles: list all vehicles
HEAD /vehicles: show the overview information of vehicle listing
POST /vehicles: create a new vehicle
GET /vehicles/12345: return the details of the vehicle 12345
HEAD /vehicles/12345: show the overview information of vehicle 12345
PATCH /vehicles/12345: update the vehicle 12345
PUT /vehicles/12345: update the vehicle 12345
DELETE /vehicles/12345: delete the vehicle 12345
OPTIONS /vehicles: show the supported verbs regarding endpoint /vehicles
OPTIONS /vehicles/12345: show the supported verbs regarding endpoint /vehicles/12345.

