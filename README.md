<h1 align="center">
Romiltec Hiring Test
</h1>
<p ><h3 align="center">Create a Laravel APIs application to handle exam transcripts. The application will have both public and private endpoints with roles.</h3></p>


## Terminology

- User will have an email and a password => admin e supervisor sono generati in maniera predefinita dal seeder
- Exam is composed of a title, a date and a vote. An user can have more than one exam, but not the same exam multiple times
- Role can be admin or supervisor => generati con le migration

## Goals
Implements the following endpoints

- Private endpoint (admin) to create new exams
- Private endpoint (supervisor) to assign a vote for an exam related to an user
- Private endpoint (user) to view your exams => visibili sulla propria home
- Public endpoint to view the list of the available exams. The exams can be sorted (by date) and filtered by title or date.

## How to proceed

- Feel free to use the standard Laravel authentication
- Unit tests and feature tests are mandatory
- The usage of a linter is not mandatory but really appreciated
- Upload your code on a GitHub repository
