<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'all_loan_applications' => [
        'name' => 'All Loan Applications',
        'index_title' => 'AllLoanApplications List',
        'new_title' => 'New Loan applications',
        'create_title' => 'Create LoanApplications',
        'edit_title' => 'Edit LoanApplications',
        'show_title' => 'Show LoanApplications',
        'inputs' => [
            'user_id' => 'User',
            'name_of_applicant' => 'Name Of Applicant',
            'phone' => 'Phone',
            'amount' => 'Amount',
            'pan_number' => 'Pan Number',
            'pan_image' => 'PanCard Image',
            'adhar_number' => 'Adhar Number',
            'adhar_image' => 'AdharCard Image',
            'bank_statement' => 'Bank Statement',
            'salary_slip' => 'Salary Slip',
            'electricity_bill' => 'Electricity Bill',
            'pincode' => 'Pincode',
            'status' => 'Status',
            'loan_type_id' => 'Loan Type',
            'bank_id' => 'Bank $ NBFC',
            'reason_of_rejection' => 'Reason Of Rejection',
        ],
    ],

    'banks' => [
        'name' => 'Banks & NBFC',
        'index_title' => 'Banks & NBFC List',
        'new_title' => 'New Bank/NBFC',
        'create_title' => 'Create Bank/NBFC',
        'edit_title' => 'Edit Bank/NBFC',
        'show_title' => 'Show Bank/NBFC',
        'inputs' => [
            'name' => 'Name',
            'image' => 'Image',
        ],
    ],

    'loan_types' => [
        'name' => 'Loan Types',
        'index_title' => 'LoanTypes List',
        'new_title' => 'New Loan type',
        'create_title' => 'Create LoanType',
        'edit_title' => 'Edit LoanType',
        'show_title' => 'Show LoanType',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'password' => 'Password',
            'role' => 'Role',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];
