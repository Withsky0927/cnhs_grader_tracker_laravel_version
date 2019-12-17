const express = require('express');
const { check, param, query, header, body } = require('express-validator');
const router = express.Router();
const path = require('path');
const multer = require('multer');

// require multer diskStorage
const registrationFileUpload = require('../config/registration_upload_config');
// controllers will go here
const registerControllers = require('../controllers/register_controller');

// middlewares will go here
const registerMiddleware = require('../middlewares/register_middleware');

const upload = multer({
  storage: registrationFileUpload.storage,
  fileFilter: registrationFileUpload.fileFilter,
});

router.get('/', registerControllers.getRegisterForm);
router.post(
  '/',
  upload.single('profile_pic'),
  (req, res, next) => {
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
  },
  [
    body('username')
      .not()
      .isEmpty()
      .withMessage('Username is required')
      .isString()
      .withMessage('Username should be a string')
      .isLength({ min: 10, max: 50 })
      .withMessage('Username should have a minimum of 10 characters')
      .escape()
      .trim(),
    // .matches(/^\d|^[@.#!#$%^&*()|;:<>\/{}\-\+]|\s/),

    body('password')
      .not()
      .isEmpty()
      .withMessage('Password is required')
      .isString()
      .withMessage('Password should be a string')
      .isLength({ min: 8, max: 150 })
      .withMessage('Password should be minimum 8 of characters')
      .trim()
      .escape(),
    // .matches(/^\d|^[@.#!#$%^&*()|;:<>\/{}\-\+]|\s/),

    body('confirmPassword')
      .not()
      .isEmpty()
      .withMessage('Password Confirmation is required')
      .isString()
      .withMessage('Password Confirmation needs to be a string')
      .trim()
      .escape()
      .isLength({ min: 8, max: 150 })
      .withMessage('Password Confirmation should be minumum 8 of characters')
      // .matches(/^\d|^[@.#!#$%^&*()|;:<>\/{}\-\+]|\s/)
      .custom((value, { req }) => {
        if (value !== req.body.password) {
          throw new Error('Password Confirmation does not match password');
        }
        // Indicates the success of this synchronous custom validator
        return true;
      }),
    body('lrn')
      .not()
      .isEmpty()
      .withMessage('LRN is required')
      .isInt()
      .withMessage(
        'LRN should be number without a non 0 number as a first digit',
      )
      .trim()
      .escape(),

    body('strand')
      .not()
      .isEmpty()
      .withMessage('Strand field is required')
      .isString()
      .withMessage('Strand should be a string')
      // .matches(/^\d|^[@.#!#$%^&*()|;:<>\/{}\-\+]|\s/)
      .isLength({ min: 0, max: 20 })
      .withMessage('Strand should have maximum  of 20')
      .escape()
      .trim(),
    body('email')
      .not()
      .isEmpty()
      .withMessage('Email is required')
      .isString()
      .withMessage('Email should be string')
      .isEmail()
      .withMessage('Email should be in email format')
      .normalizeEmail()
      .escape()
      .trim(),

    body('phone')
      .not()
      .isEmpty()
      .withMessage('Phone is required')
      .isString()
      .withMessage('Phone should be a string')
      .isLength({ min: 8, max: 20 })
      .withMessage('Phone should have minimum of 12 Characters')
      .trim()
      .escape(),
    body('firstname')
      .not()
      .isEmpty()
      .withMessage('Firstname is required')
      .isString()
      .withMessage('Firstname should be string')
      // .matches(/^\s|$\s|\d|[@.#!#$%^&*()|;:<>\/{}\-\+]/)
      .isLength({ min: 0, max: 30 })
      .withMessage('Firstname should have maximum of 30 characters')
      .escape()
      .trim(),
    body('middlename')
      .not()
      .isEmpty()
      .withMessage('Middlename is required')
      .isString()
      .withMessage('Middlename should be a string')
      // .matches(/^\s|$\s|\d|[@.#!#$%^&*()|;:<>\/{}\-\+]/)
      .isLength({ min: 0, max: 30 })
      .withMessage('Middlename should have a maximum of 30 characters')
      .escape()
      .trim(),

    body('lastname')
      .not()
      .isEmpty()
      .withMessage('Lastname is required')
      .isString()
      .withMessage('Lastname should be a string')
      .isLength({ min: 0, max: 30 })
      .withMessage('Lastname should have a maximum of 30 characters')
      .escape()
      .trim(),
    // .matches(/^\s|$\s|\d|[@.#!#$%^&*()|;:<>\/{}\-\+]/)

    body('address')
      .not()
      .isEmpty()
      .withMessage('Address is required')
      .isString()
      .withMessage('Address should to be a string')
      .isLength({ min: 0, max: 200 })
      .withMessage('Address should have a maximum of 200 characters')

      // .matches(/^[@.#!#$%^&*()|;:<>\/{}\-\+]|^\s/).
      .escape()
      .trim(),

    body('month')
      .not()
      .isEmpty()
      .withMessage('Month is required')
      .isNumeric()
      .withMessage('Month should be a number')
      .isLength({ min: 1, max: 12 })
      .withMessage('month should have minimum of 1 and maximum of 12')
      .trim()
      .escape(),
    body('day')
      .not()
      .isEmpty()
      .withMessage('Day is required')
      .isNumeric()
      .withMessage('Day should be a number')
      .isLength({ min: 1, max: 31 })
      .withMessage('Day should have minimum of 1 and maximum of 31')
      .trim()
      .escape(),
    body('year')
      .not()
      .isEmpty()
      .withMessage('Year is required')
      .isNumeric()
      .withMessage('Year should be a number')
      .isInt()
      .withMessage('Year first digit should not be a 0')
      .isLength({ max: 9999 })
      .withMessage('Year should have minimum of 1950'),

    body('age')
      .not()
      .isEmpty()
      .withMessage('Age is requred!')
      .isNumeric()
      .withMessage('Age should be a number')
      .isInt()
      .withMessage('Age first digit should not be a 0')
      .isLength({ min: 0, max: 200 })
      .withMessage('Age should have a maximum of 200')
      .trim()
      .escape(),
    body('gender')
      .not()
      .isEmpty()
      .withMessage('Gender is required')
      .isString()
      .withMessage('genders should be a string')
      // .matches(/^\s|$\s|\d|[@.#!#$%^&*()|;:<>\/{}\-\+]/)
      .isLength({ max: 15 })
      .withMessage('Gender shold have a maximum of 15 character')
      .escape()
      .trim(),

    body('civilStatus')
      .not()
      .isEmpty()
      .withMessage('Civil Status is required')
      .isString()
      .withMessage('Civil Status should be a string')
      .isLength({ min: 0, max: 20 })
      .withMessage('Civil Status should have a maximum of 20 character')
      .escape()

      .trim(),

    body('status')
      .not()
      .isEmpty()
      .withMessage('Status is required')
      .isString()
      .withMessage('Status should a string')
      .isLength({ min: 0, max: 15 })
      .withMessage('Status should have a maximum of 15')
      .trim()
      .escape(),
  ],
  registerMiddleware.validateRegisterInputs,
  registerMiddleware.checkforRegularExpression,
  registerControllers.createNewAccountForm,
);

module.exports = router;
