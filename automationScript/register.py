from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import Select
import time
def RegistrationForm():
    username = "qwerty1234"
    password = "withmore1234"
    confirmPassword = "withmore1234"
    lrn = 2013105251
    strand = "STEM"
    email = "withmoreglenda@gmail.com"
    phone = "09354075756"
    firstName = "George David"
    middleName = "Baylon"
    lastName = "Withmore"
    address = "293 Castellar St."
    month = "September"
    day = 27
    year = 1990
    gender = "Male"
    civilStatus = "Single"
    status = "Unemployed"

    driver = webdriver.Firefox()
    driver.get("http://localhost:8000/register")


    time.sleep(5)

    element = driver.find_element_by_name("username")
    element.send_keys(username)

    element = driver.find_element_by_name("password")
    element.send_keys(password)


    element = driver.find_element_by_name("confirmPassword")
    element.send_keys(confirmPassword)


    element = driver.find_element_by_name("lrn")
    element.send_keys(lrn)

    
    element = driver.find_element_by_name("strand")
    element.send_keys(strand)


    element = driver.find_element_by_name("email")
    element.send_keys(email)
 

    element = driver.find_element_by_name("phone")
    element.send_keys(phone)

 


    element = driver.find_element_by_name("firstname")
    element.send_keys(firstName)
  
 


    element = driver.find_element_by_name("middlename")
    element.send_keys(middleName)
 

    element = driver.find_element_by_name("lastname")
    element.send_keys(lastName)
    


    element = driver.find_element_by_name("address")
    element.send_keys(address)
    


    element = Select(driver.find_element_by_name("month"))
    element.select_by_visible_text(month)
    


    element = Select(driver.find_element_by_name("day"))
    element.select_by_index(3)
    

    element = driver.find_element_by_name("gender")
    element.send_keys(gender)
    

    element = driver.find_element_by_name("civilStatus")
    element.send_keys(civilStatus)
    

    element = driver.find_element_by_name("status")
    element.send_keys(status)
    