<?php

namespace Util;

abstract class UtilGenericConstants
{
    /*REQUESTS */
    public const METHOD_REQUEST = ['GET', 'POST', 'DELETE', 'PUT'];
    public const METHOD_GET = ['CLIENTS', 'DEPENDENTS'];
    public const METHOD_POST = ['CLIENTS', 'DEPENDENTS'];
    public const METHOD_DELETE = ['CLIENTS', 'DEPENDENTS'];
    public const METHOD_PUT = ['CLIENTS', 'DEPENDENTS'];


    /* ERRORS */
    public const MSG_ROUTE_ERROR = 'Non-Permitted Route';
    public const MSG_NONEXISTENT_RESOURCE_ERROR = 'Nonexistent Resource';
    public const MSG_GENERIC_ERROR = 'Something wrong happened';
    public const MSG_NON_RETURN_ERROR = 'No data founded';
    public const MSG_NON_AFFECTED_ERROR = 'No data changed';
    public const MSG_INVALID_CPF_ERROR = 'Provide a valid CPF';
    public const MSG_INVALID_NAME_ERROR = 'Provide a valid Name';
    public const MSG_INVALID_EMAIL_ERROR = 'Provide a valid Email';
    public const MSG_INVALID_STATUS_ERROR = 'Provide Status';
    public const MSG_INVALID_ADDRESS_ERROR = 'Provide a valid Address';
    public const MSG_INVALID_AGE_ERROR = 'Provide a valid Age';
    public const MSG_EMPTY_JSON_ERROR = 'Json body cannot be empty';

    /* SUCCESS */
    public const MSG_DELETE_SUCCESS = 'Deleted';
    public const MSG_UPDATE_SUCCESS = 'Updated';

    /* RETurn JSON */
    const TYPE_SUCCESS = 'success';
    const TYPE_ERROR = 'error';
}