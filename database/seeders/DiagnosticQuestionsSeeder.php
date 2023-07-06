<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiagnosticQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    //$question = ['radio_option', 'input_text_option', 'check_box_option', 'select_option'];
    public function run()
    {
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'In which agribusiness sector are you operating?',
            'options' => implode('|', ['Crop production', 'Animal production', 'Fishery', 'Forestry']),
            'input_text' => true,

        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'What role/value chain is your business operating in the agrifood/agribusiness sector?',
            'options' => implode('|', ['Production', 'Aggregation', 'Processing / Packaging', 'Logistics / Distribution', 'Retail / Marketing', 'Service Providers']),
        ]);

        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'How old is your business (from the time of registration)?',
            'options' => implode('|', ['1 – 2 years', '3 – 5 years', '6 - 8 years', '9 - 10 years', '11 - 15 years', 'Above 15 years']),
        ]);


        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'check_box_option',
            'question' => 'Where is your business located/operating?',
            'options' => implode('|', ['']),
            'is_country' => true
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'How many full-time staff do you have/operating in your business?',
            'options' => implode('|', ['1 – 5', '6 – 10', '11 – 20', '21 – 30', '31 – 50', 'Above 50']),
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'How many part-time staff do you have/operating in your business?',
            'options' => implode('|', ['1 – 5', '6 – 10', '11 – 20', '21 – 30', '31 – 50', 'Above 50']),
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'How many casual staff do you have/operating in your business?',
            'options' => implode('|', ['1 – 5', '6 – 10', '11 – 20', '21 – 30', '31 – 50', 'Above 50']),
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'How many women are involved in your business operation?',
            'options' => implode('|', ['None', '1 – 10%', '11 – 20%', '21 – 30%', '31 – 40%', '41 - 50%', 'Above 50']),
        ]);
        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'How many women are involved in your senior/management team?',
            'options' => implode('|', ['None', '1 – 10%', '11 – 20%', '21 – 30%', '31 – 40%', '41 - 50%', 'Above 50']),
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'Does your agribusiness currently have an insurance cover?',
            'options' => implode('|', ['Yes', 'No']),
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'If yes, which type of insurance cover?',
            'options' => implode('|', ['Natural disaster (Weather, Water, Fire)', 'Low productivity', 'Theft', 'Farm equipment and input (Seeds, fertilizer, products, etc)', 'General Liability', 'Not Applicable']),
            'input_text' => true,
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'Do you know what climate change is?',
            'options' => implode('|', ['Yes climate change refers to long-term shifts in temperatures and weather patterns.', 'Yes climate change describes a change in the average conditions such as temperature and rainfall in a region over a period of time.', 'Yes climate change is a change in the usual weather found in a place.', 'Yes climate change is the global phenomenon of climate transformation characterized by the changes in the usual climate of the planet that are especially caused by human activities.', 'No I do not know.', 'I am not sure.']),
        ]);
      
        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'If yes, how would you rate your understanding of climate change?',
            'options' => implode('|', ['Excellent', 'Good', 'Average', 'Fair', 'Not available']),
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'Do you believe climate change is human-induced or natural?',
            'options' => implode('|', ['Human induced', 'Natural', 'Both', 'None', 'I don’t know.']),
        ]);
        
        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'On a scale of 1 to 10, where 1 is “not at all” to 10, “extreme impact” how does climate change impact your business?',
            'options' => implode('|', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']),
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'check_box_option',
            'question' => 'If yes, what is the biggest climate change effect your business is facing/faced in the past?',
            'options' => implode('|', ['Flood', 'Drought', 'Desertification/Soil degradation', 'Weather fluctuation', 'Air pollution', 'Pest and disease infestation', 'Displacement', 'High rates of post-harvest losses', 'High rates of spoilage', 'Higher costs of raw materials', 'None']),
            'input_text' => true,
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'check_box_option',
            'question' => 'What is the biggest risk your business poses to the environment?',
            'options' => implode('|', ['Land/Soil degradation', 'Carbon emissions', 'Waste deposition', 'Environmental contamination and pollution', 'None', 'I don’t know']),
            'input_text' => true,
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'check_box_option',
            'question' => 'What greenhouse gas does your business emit the most?',
            'options' => implode('|', ['Carbon dioxide', 'Nitrous oxide', 'Methane', 'Hydrofluorocarbons', 'None', 'I don’t know']),
            'input_text' => true,
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'Has your business ever conducted an assessment of its carbon footprint?',
            'options' => implode('|', ['Yes', 'No', 'I do not understand what this means', 'I don’t know']),
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'How do you manage/mitigate emissions in your business?',
            'options' => implode('|', ['I reduce my business activities.', 'I use green solutions available from climate smart practices/approach.', 'I do not worry about emissions in my business.', 'My business has nothing to do with emissions']),
            'input_text' => true,
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'How do you currently respond to climate/environment shocks in your agribusiness?',
            'options' => implode('|', ['I have a plan in place to mitigate and adapt to climate/environmental shocks.', 'I do not have a plan in place, but I have some general knowledge on how to respond.', 'I do not have a plan in place, and do not know how to respond.']),
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'Do you know about climate smart agriculture?',
            'options' => implode('|', ['Yes', 'No', 'Not sure what this refers to']),
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'If yes, are you practicing any climate smart approach in your business?',
            'options' => implode('|', ['Yes, I utilize various climate smart approaches', 'I do not know any/about climate smart approach.', 'I am not sure of the climate approach', 'None']),
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'Do you know about any climate change policy in your country?',
            'options' => implode('|', ['Yes, I know a climate change policy in my country.', 'No, I do not know about any climate change policy in my country', 'There is no climate change policy in my country']),
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'input_text_option',
            'question' => 'If yes, which climate policy do you know?',
            'options' => implode('|', ['']),
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'Do you grow crops or work directly with out grower farmers?',
            'options' => implode('|', ['Yes', 'No']),
            'is_condition' => true,
            'condition_value' => 67,
            'condition' => 'No',
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'check_box_option',
            'question' => 'Where do you get your planting seed?',
            'options' => implode('|', ['I plant/use reserved seeds from my crop.', 'I buy from the market', 'I make use of hybrid seeds.', 'I multiple seeds']),
            'input_text' => true,
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'check_box_option',
            'question' => 'What factors do you consider when choosing seeds for planting?',
            'options' => implode('|', ['Yield potential', 'Disease resistance', 'Climate adaptability', 'Drought resistance', 'Nutritional value / Quality', 'Market demand', 'Cost of seeds', 'None']),
            'input_text' => true,
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'What do you currently use to manage pest and diseases on your farm?',
            'options' => implode('|', ['Cultural control.', 'Chemical control / Inorganic pesticides', 'Biological control / Organic pesticides', 'Integrated Pest Management', 'None']),
            'input_text' => true,
        ]);


        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'Do you believe that the use of pesticides affects the environment, crop, and human?',
            'options' => implode('|', ['Yes', 'No', 'Not sure']),
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'Have you heard of Integrated Pest Management?',
            'options' => implode('|', ['Yes, I adopt it', 'Yes, but I don’t use it', 'No', 'Not sure']),
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'check_box_option',
            'question' => 'What are the components of regenerative agriculture?',
            'options' => implode('|', ['Crop rotation', 'Livestock grazing/rotation', 'Composting', 'No tillage', 'Integrated Pest Management', 'Agroecology and agroforestry', 'Cover cropping', 'I do not have an idea, it’s my first-time hearing about it']),
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'Are you currently adopting regenerative practices, or have you ever adopted regenerative practices on your farm?',
            'options' => implode('|', ['Adopted in the past', 'Currently adopting', 'Never adopted', 'Have plans to adopt']),
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'Which of the following regenerative practices have you adopted before or currently adopting?',
            'options' => implode('|', ['Crop rotation', 'Livestock grazing/rotation', 'Composting', 'No tillage', 'Agroecology and agroforestry', 'Cover cropping', 'Carbon farming', 'Not applicable']),
            'input_text' => true,
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'check_box_option',
            'question' => 'What are the benefits of regenerative agriculture?',
            'options' => implode('|', ['Replenish the soil nutrient / restoring degraded soil.', 'Preserve and sustain the relationship between microbial activity and soil biodiversity in the ecosystem.', 'Enhance crop production.', 'Not applicable']),
            'input_text' => true,
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'check_box_option',
            'question' => 'What are your current challenges or limitations in adopting regenerative agricultural techniques in your operations?',
            'options' => implode('|', ['Data', 'Finance', 'Knowledge', 'Expertise', 'Technology', 'None']),
            'input_text' => true,
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'Do you know what greenhouse farming is?',
            'options' => implode('|', ['Yes', 'No']),
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'If yes, do you agree that greenhouse farming is a smart way of practicing agribusiness?',
            'options' => implode('|', ['Yes', 'No', 'Not sure']),
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'Do you currently or have previously adopted greenhouse farming?',
            'options' => implode('|', ['Yes', 'No']),
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'Do you know that food/crops can be grown on other medium apart from the soil/ground?',
            'options' => implode('|', ['Definitely', 'Impossible', 'Maybe/Not sure']),
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'Have you heard of soilless farming?',
            'options' => implode('|', ['Yes, I am currently practicing it', 'Yes, I know so much about it', 'Yes, a little knowledge about it', 'No']),
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'check_box_option',
            'question' => 'If yes, what type of soilless farming do you know?',
            'options' => implode('|', ['Hydroponics', 'Aeroponics', 'Aquaponics', 'Others', 'None']),
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'check_box_option',
            'question' => 'Which of the soilless farming type are you currently using/adopt?',
            'options' => implode('|', ['Hydroponics', 'Aeroponics', 'Aquaponics', 'Others', 'None', 'Not applicable']),
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'check_box_option',
            'question' => 'Why is soilless farming important in this time?',
            'options' => implode('|', ['To maximize/optimize land, space, and water', 'For increased productivity and precision farming', 'Urban farming (Ability to grow crops in urban environment)', 'All year-round cultivation/farming', 'Reduce soil-borne disease and dependent on pesticides.', 'Don’t know']),
            'input_text' => true,
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'Do you know what precision farming is?',
            'options' => implode('|', ['Yes, I am currently using it and familiar with it.', 'Yes, I have in-depth knowledge about it.', 'Yes, I have little knowledge about it.', 'No, I have no idea']),
            'input_text' => true,
        ]);


        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'check_box_option',
            'question' => 'If yes, which specific precision farming techniques/technologies are you currently using/used on your farm/operation?',
            'options' => implode('|', ['Geographical Information System (GIS)', 'Geographical Positioning System (GPS)', 'Remote Sensing', 'Soil testing and yield monitoring', 'Aerial imagery/Drone', 'None']),
            'input_text' => true,
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'How do you currently measure and monitor soil, and crop/plant health, nutrient need, on your farm?',
            'options' => implode('|', ['I depend on my previous knowledge of farming', 'I have a crop calendar', 'I just act when the need arises, or I see signs on my crop', 'I depend on precision or sensor analysis.']),
            'input_text' => true,
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'check_box_option',
            'question' => 'What are your current challenges or limitations in adopting precision farming techniques?',
            'options' => implode('|', ['Finance', 'Knowledge', 'Expertise', 'Technology', 'None']),
            'input_text' => true,
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'Have you faced any water-related challenges due to climate change in recent years?',
            'options' => implode('|', ['Yes, I have experienced drought conditions.', 'Yes, I have experienced excessive rainfall/flooding.', 'No, I have not encountered any significant challenges.', 'Not sure']),
            'input_text' => true,
        ]);

        DB::table('diagnostic_tools')->insert([
            
            'question_formate' => 'radio_option',
            'question' => 'How do you currently provide water on your farm/production operation?',
            'options' => implode('|', ['I depend on rain', 'I have a water management system in place', 'None']),
            'input_text' => true,
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'What type of water management system are you aware of?',
            'options' => implode('|', ['Rainwater harvesting', 'Groundwater recharge', 'Irrigation', 'None']),
            'input_text' => true,
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Do you practice irrigation system on your farm?',
            'options' => implode('|', ['Yes', 'No']),
            'input_text' => true,
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'check_box_option',
            'question' => 'If yes, which of the following irrigation system?',
            'options' => implode('|', 
            [
                'Drip irrigation',
                'Flood Irrigation',
                'Sprinkler irrigation',
                'Centre pivot irrigation',
                'Furrow irrigation',
                'Terraced irrigation',
            ]),
            'input_text' => true,
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'If No, why?',
            'options' => implode('|', 
            [
                'No capability',
                'Not interested',
                'No need for it',
                'No knowledge',
            ]),
            'input_text' => true,
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'check_box_option',
            'question' => 'What do you think is the benefit of implementing a water management system (e.g irrigation) on your production activity/ farm?',
            'options' => implode('|', 
            [
                'It saves water and reduces wastage of water.',
                'It allows my plants/animal to have water all round and I don’t have to depend on rain always.',
                'It preserves the soil structure.',
                'It allows for flexibility in my operation and system.',
                'It saves time.',
                'None',
            ]),
            'input_text' => true,
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Do you practice water recycling and re-use on your farm?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
                'I have no idea water can be recycle and re-use.',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Improper water management can cause disaster like flooding, erosion?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
                'Not sure',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'How frequently do you monitor and measure the water usage on your farm?',
            'options' => implode('|', 
            [
                'Daily',
                'Weekly',
                'Monthly',
                'Rarely / Never'
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'What is your major challenge in implementing and using irrigation system on your farm?',
            'options' => implode('|', 
            [
                'Maintenance',
                'Technical know-how',
                'Sustainability',
                'Cost',
                'My farm size is small.',
                'None'
            ]),
            'input_text' => true,
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Does your production facility generate waste?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
                'I am not sure.',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'How do you currently manage waste in your operation?',
            'options' => implode('|', 
            [
                'I have a circularity model in my operation.',
                'I practice zero waste.',
                'I leave them on the farm to decompose.',
                'I burn them.',
                'I have a waste storage on my farm and give it to external waste disposing agency.',
                'I am not concerned.',
                'None'
            ]),
            'input_text' => true,
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Do you believe the waste from your farm can be re-used or recycled?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
                'I don’t know.',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'check_box_option',
            'question' => 'What is your source of energy on your farm?',
            'options' => implode('|', 
            [
                'Fossil fuel',
                'Solar energy',
                'Inverter',
                'Electricity',
                'Biogas',
                'Water',
                'None',
            ]),
            'input_text' => true,
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Do you know your daily output of carbon emission due to the use of fossil fuel or the amount of carbon emission saved due to use of alternative energy?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
                'I am not concerned.',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Do you know that the use of fossil fuel is hazardous to the environment?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
                'Maybe',
                'I don’t care.',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Can your operation adopt other source of energy aside the use of fossil fuel?',
            'options' => implode('|', 
            [
                'Yes, currently using alternative source of energy.',
                'Yes, but not using any.',
                'No',
                'Not sure / I don’t know.',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Do you operate in the processing value chain either primarily or secondarily?',
            'options' => implode('|', 
            [
                'Yes, primarily.',
                'Yes, secondarily.',
                'No',
            ]),
            'is_condition' => true,
            'condition_value' => 80,
            'condition' => 'No',
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Does your processing facility generate waste?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
                'I am not sure.',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Do you know about waste recycling/circularity?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'How do you currently manage waste in your operation?',
            'options' => implode('|', 
            [
                'I have a circularity model in my operation.',
                'I practice zero waste.',
                'I leave them on the farm to decompose.',
                'I burn them.',
                'I have a waste storage on my farm and give it to external waste disposing agency.',
                'I am not concern.',
                'None'
            ]),
            'input_text' => true,
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Do you believe the waste from your facility can be re-use or recycle?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
                'I don’t know.',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'check_box_option',
            'question' => 'What is your source of energy on your farm?',
            'options' => implode('|', 
            [
                'Fossil fuel',
                'Solar energy',
                'Inverter',
                'Electricity',
                'Biogas',
                'Water',
                'None'
            ]),
            'input_text' => true,
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Do you know your daily output of carbon emission due to the use of fossil fuel or the amount of carbon emission saved due to use of alternative energy?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
                'I am not concerned.',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Do you know that the use of fossil fuel is hazardous to the environment?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
                'Maybe',
                'I don’t care.'
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Can your operation adopt other source of energy aside the use of fossil fuel?',
            'options' => implode('|', 
            [
                'Yes, currently using alternative source of energy.',
                'Yes, but not using any.',
                'No',
                'Not sure / I don’t know.'
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Have you faced any water-related challenges due to climate change in recent years?',
            'options' => implode('|', 
            [
                'Yes, I have experienced drought conditions.',
                'Yes, I have experienced excessive rainfall/flooding.',
                'No, I have not encountered any significant challenges.',
                'Not sure'
            ]),
            'input_text' => true,
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'check_box_option',
            'question' => 'How do you currently provide water for your processing operation?',
            'options' => implode('|', 
            [
                'Rain',
                'River and Well',
                'Borehole',
                'None'
            ]),
            'input_text' => true,
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Do you have a water storage/ conservation system in place?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'How frequently do you monitor and measure the water usage on your farm?',
            'options' => implode('|', 
            [
                'Daily',
                'Weekly',
                'Monthly',
                'Rarely / Never',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Do you operate in the packaging value chain either primarily or secondarily?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
            ]),
            'is_condition' => true,
            'condition_value' => 94,
            'condition' => 'No',
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'How important is packaging in ensuring the freshness and quality of agricultural products?',
            'options' => implode('|', 
            [
                'Very important',
                'Somewhat important',
                'Neutral',
                'Not important'
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'check_box_option',
            'question' => 'Which type of packaging materials do you currently use?',
            'options' => implode('|', 
            [
                'Plastic',
                'Paper',
                'Biodegradable materials',
                'Foils',
                'Nylon',
                'Sacs',
                'None',
            ]),
            'input_text' => true,
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Do you think your current packaging material is sustainable and eco-friendly?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
                'Not sure',
                'I don’t know.',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'input_text_option',
            'question' => 'If yes, how?',
            'options' => implode('|', 
            [
                '',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'How concerned are you about the environmental impact of your current packaging material?',
            'options' => implode('|', 
            [
                'Very concern',
                'Neutral',
                'Not concern.',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'check_box_option',
            'question' => 'What are the main challenges you face in the packaging chain?',
            'options' => implode('|', 
            [
                'Cost of packaging material',
                'Packaging design and functionality',
                'Sustainability and environmental impact',
                'Storage and transportation logistics',
                'Compliance with regulations',
                'None'
            ]),
            'input_text' => true,
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Is your packaging material recyclable?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
                'Not sure',
            ]),
            'input_text' => true,
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'check_box_option',
            'question' => 'What improvements would you like to see in agricultural packaging?',
            'options' => implode('|', 
            [
                'Increased use of biodegradable materials',
                'Enhanced product protection features',
                'Improved labelling and information transparency',
                'More efficient packaging designs for transportation',
                'None',
            ]),
            'input_text' => true,
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'How important is it for packaging to provide clear and accurate product information (i.e origin, nutritional fact, etc)',
            'options' => implode('|', 
            [
                'Very important',
                'Somewhat important',
                'Neutral',
                'Not important',
            ]),
            'input_text' => true,
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Is your current packaging material providing adequate product information for consumer?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
                'Not sure '
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'How likely are you to choose packaging materials with lower environmental impact, even if they cost more?',
            'options' => implode('|', 
            [
                'Most likely',
                'Somewhat likely',
                'Neutral',
                'Not likely',
                'Indecisive',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Are you aware of any eco-friendly packaging?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'If yes, which of the following are you using?',
            'options' => implode('|', 
            [
                'Reusable packaging',
                'Biodegradable packaging',
                'Bioplastics',
                'Cardboard',
                'None',
                
            ]),
            'input_text' => true,
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Do you store your produce/products?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'If yes, what is your current storage practice/device?',
            'options' => implode('|', 
            [
                'Silo',
                'Cribs',
                'Store building',
                'Underground',
                'Drums',
                'Cans',
                'Bags and Sacs',
                'Cold-room',
                'None',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Have you experienced any negative climate/environmental impacts on your stored produce/storage operation due to climate change?',
            'options' => implode('|', 
            [
                'Yes',
                'No'
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Which climate related factors have affected your storage the most?',
            'options' => implode('|', 
            [
                'Increased temperature',
                'Humidity changes',
                'Extreme weather condition/events (storms, flood, etc)',
                'Pests and diseases',
                'None',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Do you use chemical or inorganic preservation for use storage activity?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
                'Not sure',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Are you currently using any climate smart storage technique/method?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'If yes, which',
            'options' => implode('|', 
            [
                'Temperature control',
                'Humidity control',
                'Ventilation systems',
                'Insulation',
                'Cold room storage',
                'None',
            ]),
            'input_text' => true,
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Does your storage facility generate waste of any kind?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
                'I am not sure.'
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'How do you currently manage waste in your operation?',
            'options' => implode('|', 
            [
                'I have a circularity model in my operation.',
                'I practice zero waste.',
                'I leave them to decompose.',
                'I burn them.',
                'I have a waste storage and give it to external waste disposing agency.',
                'I am not concern.',
                'None',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Do you believe the waste from your facility can be re-use or recycle?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
                'I don’t know.'
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Do you know about waste recycling/circularity?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'check_box_option',
            'question' => 'What is your source of energy on your farm?',
            'options' => implode('|', 
            [
                'Fossil fuel',
                'Solar energy',
                'Inverter',
                'Electricity',
                'Biogas',
                'Water',
                'None',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Do you know your daily output of carbon emission due to the use of fossil fuel or the amount of carbon emission saved due to use of alternative energy?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
                'I am not concern.',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Do you know that the use of fossil fuel is hazardous to the environment?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
                'Maybe',
                'I don’t care.',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Can your operation adopt other source of energy aside the use of fossil fuel?',
            'options' => implode('|', 
            [
                'Yes, currently using alternative source of energy.',
                'Yes, but not using any.',
                'No',
                'Not sure / I don’t know.',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Do you operate a personal logistics and distribution chain for your business, or you use third party?',
            'options' => implode('|', 
            [
                'Yes, I have a personal logistics and distribution chain.',
                'Yes, I depend on third party.',
                'My buyers/customer handles that.',
                'None',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'If yes, what is the current logistics and distribution energy use/reliance?',
            'options' => implode('|', 
            [
                'I use fossil fuel vehicles like diesels and petrol cars, bikes, etc',
                'I use solar powered vehicles/automobiles.',
                'I use electric automobiles.',
                'None',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Are there any technology innovations adopted to the model?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'check_box_option',
            'question' => 'If yes, which of this technology innovations are adopted to your supply/logistic chain?',
            'options' => implode('|', 
            [
                'Tracking device for my vehicles and goods',
                'Mobile App',
                'Barcode Scanning',
                'Product/goods traceability',
                'None',
            ]),
            'input_text' => true,
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Does your business produce food waste/loss?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'What percentage of your produce is wasted?',
            'options' => implode('|', 
            [
                'Less than 10%',
                '11 – 20%',
                '21 – 30%',
                '31 – 40%',
                '41 – 50%',
                'Above 50%',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'How do you prevent or reduce food loss in your operation and keep food fresh and healthy?',
            'options' => implode('|', 
            [
                'I have a cold-room storage and transport facility.',
                'I do no produce waste as I sell of goods immediately.',
                'I outsource and partner with cold-room storage providers.',
                'None',
            ]),
            'input_text' => true,
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'How do you manage the generated waste?',
            'options' => implode('|', 
            [
                'I recycle.',
                'I dump them.',
                'I sell off.',
                'I am not concern and so pay no attention to it.',
                'None'
            ]),
            'input_text' => true,
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Do you know about waste recycling?',
            'options' => implode('|', 
            [
                'Yes, I use it in my business model.',
                'Yes, but I do not use it.',
                'No',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Do you operate in the agrifood sector as a restaurant owner, chef, or cook?',
            'options' => implode('|', 
            [
                'Yes, primarily.',
                'No',
            ]),
            'is_condition' => true,
            'condition_value' => 123,
            'condition' => 'No',
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'check_box_option',
            'question' => 'How do you handle food waste from your operations?',
            'options' => implode('|', 
            [
                'I thrash them.',
                'I give it out.',
                'I do not have food waste.',
                'I recycle.',
                'I give it out.',
            ]),
            'input_text' => true,
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Do you know food waste cause contamination to the environment and climate?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
                'Not sure',
            ]),
            'input_text' => true,
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Do you know about food recycling/food transformation?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Is your supply chain sustainable?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
                'I don’t know.',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'What form of technology have adopted into your supply chain?',
            'options' => implode('|', 
            [
                'Mobile App',
                'Tracker',
                'Barcode Scanning',
                'None',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Have you heard of carbon market/climate financing/carbon credit?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
                'It’s a myth.',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Have you benefited from carbon credits before?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Do you know how to calculate your carbon footprint?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
            ]),
        ]);
        DB::table('diagnostic_tools')->insert([
            'question_formate' => 'radio_option',
            'question' => 'Will you be willing to adopt climate smart practices if you are certain of receiving carbon credit for them?',
            'options' => implode('|', 
            [
                'Yes',
                'No',
            ]),
        ]);
    }
}
	