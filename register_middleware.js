const JOI = require('@hapi/joi');
const bcrypt = require('bcryptjs');
const uuid = require('uuid/v4');
const momment = require('sequelize');
const { validationResult } = require('express-validator');
const Sequelize = require('sequelize');
const multer = require('multer');
const path = require('path');
const registrationFileUpload = require('../config/registration_upload_config');
const registerModel = require('../models/register_model.js');

const validateFile = (req, res, next) => {
  const title = 'Please Select an Image';
  const fileError = [];
  upload(req, res, (err) => {
    if (!req.file) {
      console.log(2);
      fileError.push({ msg: 'Please Select an Image' });
      return res.render('register', { errors: fileError, title: title });
    }

    if (err instanceof multer.MulterError) {
      console.log(3);
      fileError.push({ msg: err });
      return res.render('register', { errors: fileError, title: title });
    }
    if (err) {
      console.log(3);
      fileError.push({ msg: 'Theres an error uploading the image' });
      return res.render('register', { errors: fileError, title: title });
    }
  });
  next();
};

const sendConfirmation = (req, res, next) => {};

const checkforRegularExpression = (req, res, next) => {
  let Regex1 = /^\d|^[@.#!#$%^&*()|;:<>\/{}\-\+]|\s/g;
  let Regex2 = /^\s|$\s|\d|[@.#!#$%^&*()|;:<>\/{}\-\+]/g;
  let Regex3 = /^[@.#!#$%^&*()|;:<>\/{}\-\+]|^\s/g;
  let RegexResult = {};
  let RegexErrors = [];
  const {
    username,
    password,
    confirmPassword,
    strand,
    firstname,
    middlename,
    lastname,
    address,
    birthday,
    gender,
    civilStatus,
    status,
  } = req.body;

  RegexResult.username = Regex1.test(username);
  Regex1.lastIndex = 0;
  RegexResult.password = Regex1.test(password);
  Regex1.lastIndex = 0;
  RegexResult.confirmPassword = Regex1.test(confirmPassword);
  Regex1.lastIndex = 0;
  RegexResult.strand = Regex1.test(strand);
  Regex1.lastIndex = 0;
  RegexResult.firstname = Regex2.test(firstname);
  Regex2.lastIndex = 0;
  RegexResult.middlename = Regex2.test(middlename);
  Regex2.lastIndex = 0;
  RegexResult.lastname = Regex2.test(lastname);
  Regex2.lastIndex = 0;
  RegexResult.gender = Regex2.test(gender);
  Regex2.lastIndex = 0;
  RegexResult.civilStatus = Regex2.test(civilStatus);
  Regex2.lastIndex = 0;
  RegexResult.status = Regex2.test(status);
  Regex2.lastIndex = 0;
  RegexResult.address = Regex3.test(address);
  Regex3.lastIndex = 0;

  for (const [field, value] of Object.entries(RegexResult)) {
    if (
      field === 'username' ||
      field === 'password' ||
      field === 'confirmPassword' ||
      field === 'strand'
    ) {
      if (value === true) {
        RegexErrors.push({
          msg: `Invalid ${field}: Numeric, Special character as first entry and space is not allowed`,
        });
      }
    } else if (
      field === 'firstname' ||
      field === 'middlename' ||
      field === 'lastname' ||
      field === 'gender' ||
      field === 'civilStatus' ||
      field === 'status'
    ) {
      if (value === true) {
        RegexErrors.push({
          msg: `Invalid ${field}: Space as first entry, Special Character, and Number is not allowed`,
        });
      }
    } else if (field === 'address') {
      if (value === true) {
        RegexErrors.push({
          msg: `Invalid ${field}: Space, Special Character as first entry is not allowed`,
        });
      }
    }
  }
  if (RegexErrors.length > 0) {
    const title = 'Registration Form';
    console.log({ errors: RegexErrors });
    return res.render('register', { errors: RegexErrors, title: title });
  }
  next();
};

const validateRegisterInputs = (req, res, next) => {
  let validateError = validationResult(req);
  const title = 'Registration Form';
  console.log(validateError);
  if (!validateError.isEmpty()) {
    console.log({ errors: validateError.array() });

    return res.render('register', {
      errors: validateError.array(),
      title: title,
    });
  }
  next();
};
const checkUserExist = (req, res, next) => {};

module.exports = {
  validateRegisterInputs,
  checkforRegularExpression,
  checkUserExist,
  validateFile,
  sendConfirmation,
};
