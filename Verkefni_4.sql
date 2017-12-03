# New Student

use Verkefni_4;

DELIMITER $$

CREATE PROCEDURE `newStudent`(IN `s_studentID` INT(11), IN `s_studentName` VARCHAR(255), IN `s_trackID` INT, IN `s_semester_ID` INT)
  BEGIN
    INSERT INTO Verkefni_4.students (studentID, studentName, trackID, semester_ID) VALUES (s_studentID, s_studentName, s_trackID, s_semester_ID);
  END $$

DELIMITER ;

CALL newStudent(1304982049, 'Adam Bæhrenz', 9, 5);


# Select Student

use Verkefni_4;

DELIMITER $$

CREATE PROCEDURE `selectStudent`(IN `s_studentID` INT(11))
  BEGIN
    SELECT * FROM students WHERE studentID = s_studentID;
  END $$

DELIMITER ;

CALL selectStudent(1304982049);


# Delete Student

use Verkefni_4;

DELIMITER $$

CREATE PROCEDURE `deleteStudent`(IN `s_studentID` INT(11))
  BEGIN
    DELETE FROM Verkefni_4.students WHERE students.studentID = s_studentID;
  END $$

DELIMITER ;

CALL deleteStudent(1304982049);