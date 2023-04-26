mysql <<EOFMYSQL
use amcostal;
show tables;

DROP TABLE Applications;
DROP TABLE Jobs;
DROP TABLE Students;

CREATE TABLE Students (
    StudentId INT PRIMARY KEY,
    StudentName VARCHAR(50),
    Major VARCHAR(50)
    );
    DESC Students;

CREATE TABLE Jobs (
    JobId INT PRIMARY KEY,
    CompanyName VARCHAR(50),
    JobTitle VARCHAR(50),
    Salary INT,
    DesiredMajor VARCHAR(50)
    );
    DESC Jobs;

    
CREATE TABLE Applications (
    StudentId INT,
    JobId INT,
    FOREIGN KEY (StudentId) REFERENCES Students(StudentId),
    FOREIGN KEY (JobId) REFERENCES Jobs(JobId)
    );
    DESC Applications;

EOFMYSQL

