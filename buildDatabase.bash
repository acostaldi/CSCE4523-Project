CREATE TABLE Students (
    StudentId INT PRIMARY KEY,
    StudentName VARCHAR(50),
    Major VARCHAR(50)
    );

 CREATE TABLE Jobs (
    JobId INT PRIMARY KEY,
    CompanyName VARCHAR(50),
    JobTitle VARCHAR(50),
    Salary INT,
    DesiredMajor VARCHAR(50)
    );
    
CREATE TABLE Applications (
    StudentId INT,
    JobId INT,
    FOREIGN KEY (StudentId) REFERENCES Students(StudentId),
    FOREIGN KEY (JobId) REFERENCES Jobs(JobId)
    );

