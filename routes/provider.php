<?php
//------ START PROVIDER -------
Route::post('customFileUpload', array('as' => 'custom.fileUpload', 'uses' => 'FileUploadController@fileUpload'));

Route::group(['namespace' => 'Provider', 'prefix' => 'provider', 'as'=>'provider.'], function (){
    //Login & Logout
    Route::get('login', array('as'=>'login', 'uses'=>'MasterController@getLogin'));
    Route::post('login', array('as'=>'login', 'uses' => 'MasterController@postLogin'));
    Route::get('logout', array('as'=>'logout', 'uses' => 'MasterController@logout'));

    Route::get('pro_email_verification', array('uses'=>'MasterController@email_verification'));
    Route::post('pro_email_verification', array('uses'=>'MasterController@email_verification_action'));
    Route::get('confirmation', array('as'=>'confirmation', 'uses'=>'MasterController@confirmation'));
    Route::get('unauthorized_token', array('uses'=>'MasterController@unauthorized_token'));
    Route::get('account_verified', array('uses'=>'MasterController@account_verified'));

    //Forgot Password
    Route::get('forgotPassword', array('as'=>'forgotPassword', 'uses'=>'MasterController@forgotPassword'));
    Route::post('forgotPasswordAc', array('as'=>'forgotPasswordAc', 'uses'=>'MasterController@forgotPasswordAc'));
    Route::get('forgot_email_verification', array('uses'=>'MasterController@forgot_email_verification'));
    Route::post('forgot_email_verification', array('uses'=>'MasterController@forgot_email_verification_action'));

    Route::group(['middleware' => 'providerAuth'], function (){
        Route::get('/', ['as'=>'apps', 'uses' => 'MasterController@apps']);

        Route::get('ownerProfile/{id}/{name}', array('as'=>'ownerProfile', 'uses'=>'ProfileController@ownerProfile'));

        //----------- START ADMIN PANEL -----------
        Route::group(['prefix' => 'admin', 'as'=>'admin.'], function (){
            Route::get('/', array('uses'=>'MasterController@admin'));
            Route::get('welcome', array('uses'=>'MasterController@admin_home'));
            Route::get('javascript', array('uses'=>'AdapterController@javascript_admin'));
            //CHANGE PASSWORD
            Route::put('changeTimeZone', array('as' => 'changeTimeZone', 'uses' => 'ProfileController@changeTimeZone'));

            //PROFILE UPDATE
            Route::get('user-profile', array('as'=>'userProfile', 'uses'=>'ProfileController@userProfile'));
            Route::put('user-profile', array('as' => 'userProfileUpdate', 'uses' => 'ProfileController@userProfileUpdate'));
            Route::post('changePassword', array('as' => 'changePassword', 'uses' => 'ProfileController@changePassword'));
            
            Route::group(['namespace' => 'Admin', 'middleware' => 'providerUserAccess'], function (){
                Route::get('dashboard', array('as'=>'dashboard', 'uses'=>'DashboardController@index'));
                //Menu sorting
                Route::get('menuSorting', array('as' => 'menuSorting', 'uses' => 'MenuController@menuSorting'));
                Route::get('menuSortingMenuList', array('as' => 'menuSortingMenuList', 'access' => ['menuSorting'], 'uses' => 'MenuController@menuSortingMenuList'));
                Route::post('menuSorting', array('as' => 'menuSorting', 'uses' => 'MenuController@menuSortingAction'));

                //Supply Chain
                Route::get('supply-chain', array('as' => 'supply-chain', 'uses' => 'ChainController@chainListData'));
                Route::get('updateChain', array('as' => 'updateChain', 'access' => ['supply-chain'], 'uses' => 'ChainController@updateChain'));
                Route::put('updateChainAction', array('as' => 'updateChainAction', 'access' => ['supply-chain'], 'uses' => 'ChainController@updateChainAction'));
                Route::post('updateChaindestroy', array('as' => 'updateChaindestroy', 'access' => ['supply-chain'], 'uses' => 'ChainController@updateChaindestroy'));

                ///test
                Route::get('employeeAccessMenuView', array('as' => 'employeeAccessMenuView', 'access' => ['employeeAccess'], 'uses' => 'EmployeeAccessController@employeeAccessMenuView'));

                Route::get('compileEmployeeOrganogram', array('as' => 'compileEmployeeOrganogram', 'uses' => 'EmployeeController@compileEmployeeOrganogram'));
                Route::post('compileEmployeeOrganogram', array('as' => 'compileEmployeeOrganogram', 'uses' => 'EmployeeController@compileEmployeeOrganogramAction'));

                Route::get('employeeAccess', array('as' => 'employeeAccess', 'access' => ['employeeAccess'], 'uses' => 'EmployeeAccessController@employeeAccess'));
                Route::post('employeeAccess', array('as' => 'employeeAccess', 'access' => ['employeeAccess'], 'uses' => 'EmployeeAccessController@employeeAccessAction'));

                Route::get('employeeAccessView', array('as' => 'employeeAccessView', 'access' => ['employeeAccess'], 'uses' => 'EmployeeAccessController@employeeAccessView'));
                Route::get('employeeListData', array('access' => ['resource|employee.index'], 'uses' => 'EmployeeController@employeeListData'));
  
                Route::name('provider.admin.')->group(function(){
                    Route::resource('employee', 'EmployeeController');
                    
                    Route::get('employeeIdView', array('access' => ['resource|employee.create'], 'uses' => 'EmployeeController@employeeIdView'));
                    Route::get('employeeEmailResend', array('as' => 'employeeEmailResend', 'access' => ['resource|employee.index'], 'uses' => 'EmployeeController@employeeEmailResend'));

                    //Access Package
                    Route::resource('accessPackage', 'AccessPackageController');
                    Route::get('accessPackageListData', array('access' => ['resource|accessPackage.index'], 'uses' => 'AccessPackageController@accessPackageListData'));

                    Route::get('employeeOrganogram', array('access' => ['employee'], 'as' => 'employeeOrganogram', 'uses' => 'EmployeeController@employeeOrganogram'));

                    //Advance Search
                    Route::get('employeeSearch', array('access' => ['resource|salesTarget.create', 'resource|salesTarget.edit'], 'uses'=>'AdvanceSearchController@employeeSearch'));
                    
                    //costCalculationItem
                    Route::resource('costCalculationItem', 'CostCalculationItemController');
                    Route::get('costCalculationItemData', array('access' => ['resource|costCalculationItem.index'], 'uses' => 'CostCalculationItemController@costCalculationItemData'));

                     //Catagory
                     Route::resource('costCategoryItem', 'CostCategoryItemController');
                     Route::get('costCategoryItemData', array('access' => ['resource|costCategoryItem.index'], 'uses' => 'CostCategoryItemController@costCategoryItemData'));
                    
                    //targetPercentageListData
                    Route::resource('target_Percentage', 'TargetPercentageController');
                    Route::get('targetPercentageListData', array('access' => ['resource|target_Percentage.index'], 'uses' => 'TargetPercentageController@targetPercentageListData'));

                    //Service Category
                    Route::resource('deProduct', 'deProductController');
                    Route::get('deProductListData', array('access' => ['resource|deProduct.index'], 'uses' => 'deProductController@deProductListData'));
                    
                    //cost
                    Route::get('addCostCreate', array('access' => ['resource|deProduct.index'], 'as' => 'addCostCreate', 'uses' => 'deProductController@addCostCreate'));
                    Route::post('addCostCreateAction', array('access' => ['resource|deProduct.index'], 'as' => 'addCostCreateAction', 'uses' => 'deProductController@addCostCreateAction'));
                    Route::post('addCostUpadteAction', array('access' => ['resource|deProduct.index'], 'as' => 'addCostUpadteAction', 'uses' => 'deProductController@addCostUpadteAction'));
                    
                    //Job Area
                    Route::resource('area', 'AreaController');
                    Route::get('areaListData', array('access' => ['resource|area.index'], 'uses' => 'AreaController@areaListData'));
                    Route::get('areaAdd', array('access' => ['resource|area.create'], 'uses' => 'AreaController@add'));

                    //Mail Configaration
                    Route::get('crmMailConfigaration', array('as' => 'crmMailConfigaration', 'uses' => 'ProjectMailConfigurationController@create'));
                    Route::put('crmMailConfigarationAc', array('access' => ['crmMailConfigaration'], 'as' => 'crmMailConfigarations', 'uses' => 'ProjectMailConfigurationController@store'));
                    Route::get('crmMailConfigarationTest', array('access' => ['crmMailConfigaration'], 'uses' => 'ProjectMailConfigurationController@configarationTest'));

                    //Project Update
                    Route::get('profileUpdate', array('as' => 'profileUpdate', 'uses' => 'CrmProjectController@edit'));
                    Route::put('profileUpdateAc', array('access' => ['profileUpdate'], 'as' => 'profileUpdateAc', 'uses' => 'CrmProjectController@update'));

                    //Corporate Account For Access Withdraw
                    Route::get('corporateAccountForWithdraw', array('as'=>'corporateAccountForWithdraw', 'uses' => 'AccountAccessWithdrawController@corAccountListData'));
                    Route::get('corAccountForWithdrawListData', array('access' => ['corporateAccountForWithdraw'], 'uses' => 'AccountAccessWithdrawController@corAccountForWithdrawListData'));

                    //Corporate Account Access Withdraw
                    Route::get('accountAccessWithdraw', array('as' => 'accountAccessWithdraw', 'access' => ['corporateAccountForWithdraw'], 'uses' => 'AccountAccessWithdrawController@accountAccessWithdraw'));
                    Route::post('accountAccessWithdrawAction', array('as' => 'accountAccessWithdrawAction', 'access' => ['corporateAccountForWithdraw'], 'uses' => 'AccountAccessWithdrawController@accountAccessWithdrawAction'));
                    Route::get('get-user-item', array('access' => ['resource|costCalculationItem.create'], 'as' => 'getUserItems','uses'=>'AdvanceSearchController@getUserItems'));
                    Route::get('get-user-item_sameProduct', array('access' => ['resource|costCalculationItem.create'], 'as' => 'getUserItemsSameProduct','uses'=>'AdvanceSearchController@getUserItemsSameProduct'));

                });
            });
        });
        //----------- END ADMIN PANEL -----------
        
        //----------- START APPROVAL SYSTEM -----------
        Route::group(['prefix' => 'approvalSystem', 'as'=>'approvalSystem.'], function (){
            Route::get('/', array('uses'=>'MasterController@approvalSystem'));
            Route::get('welcome', array('uses'=>'MasterController@approvalSystem_home'));
            Route::get('javascript', array('uses'=>'AdapterController@javascript_approvalSystem'));

            //CHANGE PASSWORD
            Route::put('changeTimeZone', array('as' => 'changeTimeZone', 'uses' => 'ProfileController@changeTimeZone'));

            //PROFILE UPDATE
            Route::get('user-profile', array('as'=>'userProfile', 'uses'=>'ProfileController@userProfile'));
            Route::put('user-profile-action', array('as' => 'userProfileUpdate', 'uses' => 'ProfileController@userProfileUpdate'));
            Route::post('changePassword', array('as' => 'changePassword', 'uses' => 'ProfileController@changePassword'));
            
            Route::group(['namespace' => 'ApprovalSystem', 'middleware' => 'providerUserAccess'], function (){
                Route::get('home', array('as'=>'home', 'uses'=>'HomeController@index'));
                Route::get('dashboard', array('as'=>'dashboard', 'uses'=>'DashboardController@index'));
                Route::get('serviceCategoryChain', array('access' => ['resource|serviceRequest.index'], 'as' => 'serviceCategoryChain', 'uses' => 'ServiceRequestController@serviceCategoryChain'));
                //request receive
                Route::get('requestReceive', array('as' => 'requestReceive', 'uses' => 'RequestReceiveController@index'));
                Route::get('requestReceivetListData', array('access' => ['requestReceive'], 'as' => 'requestReceivetListData', 'uses' => 'RequestReceiveController@requestReceivetListData'));

                //feedback  
                Route::get('info-feedback', array('access' => ['requestReceive'], 'as' => 'info-feedback', 'uses' => 'RequestReceiveController@infoFeedback'));
                Route::post('info-feedback', array('access' => ['requestReceive'], 'as' => 'infoFeedbackAction', 'uses' => 'RequestReceiveController@infoFeedbackAction'));
                Route::get('info-accept-status', array('access' => ['requestReceive'], 'as' => 'infoAcceptStatus', 'uses' => 'RequestReceiveController@infoAcceptStatus'));

                //View Note
                Route::get('viewRequestedNote', array('access' => ['requestReceive'], 'as' => 'viewRequestedNote', 'uses' => 'RequestReceiveController@viewRequestedNote'));
                //Ready for job area ready_for_job
                    
                Route::get('ready_for_job', array('as' => 'ready_for_job', 'uses' => 'ReadyForJobController@index'));
                Route::get('ReadyForJobListData', array('access' => ['ready_for_job'], 'as' => 'ReadyForJobListData', 'uses' => 'ReadyForJobController@ReadyForJobListData'));
                
                //plannerRequest
                Route::get('plannerRequest', array('as' => 'plannerRequest', 'uses' => 'PlannerRequestController@index'));
                Route::get('plannerRequestListData', array('access' => ['plannerRequest'], 'as' => 'plannerRequestListData', 'uses' => 'PlannerRequestController@plannerRequestListData'));
                //request approved

                Route::get('request-approved', array('as' => 'request-approved', 'uses' => 'RequestApprovedController@index'));
                Route::get('RequestApprovedListData', array('access' => ['requestReceive'], 'as' => 'RequestApprovedListData', 'uses' => 'RequestApprovedController@RequestApprovedListData'));
                Route::get('request-receive-accept-status', array('access' => ['requestReceive'], 'as' => 'requestReceiveAcceptStatus', 'uses' => 'RequestApprovedController@requestReceiveAcceptStatus'));

                //end
                // Route::get('request-approved', array('as' => 'request-approved', 'uses' => 'RequestApprovedController@RequestApprovedListData'));

                Route::get('requestAprrovedStatus', array('as' => 'requestAprrovedStatus','access' => ['request-approved'], 'uses' => 'RequestApprovedController@requestAprrovedStatus'));
                Route::put('requestAprrovedStatusAction', array('as' => 'requestAprrovedStatusAction','access' => ['request-approved'], 'uses' => 'RequestApprovedController@requestAprrovedStatusAction'));
                
                Route::get('aprrovedInfoPreview', array('access' => ['request-approved'], 'as' => 'aprrovedInfoPreview', 'uses' => 'RequestApprovedController@aprrovedInfoPreview'));
                
                //Resource route under this group
                Route::name('provider.approvalSystem.')->group(function(){ 
                     //request info
                     Route::resource('requestInfoSend', 'RequestInfoController');
                     Route::get('requestInfoSendListData', array('as' => 'requestInfoSendListData','access' => ['resource|requestInfoSend.index'], 'uses' => 'RequestInfoController@requestInfoSendListData'));
                     Route::get('viewSendedNote', array('as' => 'viewSendedNote','access' => ['resource|requestInfoSend.index'], 'uses' => 'RequestInfoController@viewSendedNote'));

                    //Service Category
                    Route::resource('serviceRequest', 'ServiceRequestController');
                    Route::get('serviceRequestListData', array('access' => ['resource|serviceRequest.index'], 'uses' => 'ServiceRequestController@serviceRequestListData'));
                    Route::get('requestProgress', array('as' => 'requestProgress', 'access' => ['resource|serviceRequest.index'], 'uses' => 'ServiceRequestController@requestProgress'));
                    Route::get('requestProgressDetails', array('as' => 'requestProgressDetails', 'access' => ['resource|serviceRequest.index'], 'uses' => 'ServiceRequestController@requestProgressDetails'));
                    Route::get('serviceRequestPoke', array('as' => 'serviceRequestPoke', 'access' => ['resource|serviceRequest.index'], 'uses' => 'ServiceRequestController@serviceRequestPoke'));
                });
            });
            
        });
        //----------- END APPROVAL SYSTEM -----------
    });
});
//------ END PROVIDER -------