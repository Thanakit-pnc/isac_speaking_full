<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartOne extends Model
{
    public static function question($topic) {
        switch($topic) {
            case '1':
                return self::topic1();
                break;
            case '2':
                return self::topic2();
                break;
            case '3':
                return self::topic3();
                break;
            case '4':
                return self::topic4();
                break;
            case '5':
                return self::topic5();
                break;
            case '6':
                return self::topic6();
                break;
            case '7':
                return self::topic7();
                break;
            case '8':
                return self::topic8();
                break;
            case '9':
                return self::topic9();
                break;
            case '10':
                return self::topic10();
                break;
            default:
                return 'Error null';
        }
    }
    
    public static function topic1() {
        return [
            'Was your hometown a good place to grow up?',
            'How has your hometown changed since you were a child?',
            'Are there any things you didn’t like about where you grew up?',
            'What was the most interesting thing about your hometown?',
            'Which city would you most like to visit?',
            'How do you know about this place?',
            'What would be the best time of year to visit this place?',
            'Do you think you will visit this city in the future?',
        ];
    }

    public static function topic2() {
        return [
            'Is there much crime where you live?',
            'Is there more crime in cities or in the countryside?',
            'What kind of crime happens online?',
            'Why do you think people commit crimes?',
            'Do many young people in your country want to become police officers?',
            'Is being a lawyer a popular job?',
            'What are the qualities needed to be a good police officer?',
            'Would you like a job in law?',
        ];
    }

    public static function topic3() {
        return [
            'What kinds of pollution can be found where you live?',
            'What is the cause of this pollution?',
            'Why do some people throw rubbish in public places?',
            'Would you help to keep your city clean?',
            'What kinds of wild animals live in your country?',
            'What is your favourite wild animal?',
            'Is it important to protect animals at risk?',
            'Are zoos good places for wild animals?',
        ];
    }

    public static function topic4() {
        return [
            'Do you eat fresh fruit and vegetables every day?',
            'How easy is it to get fruit and vegetables where you live?',
            'What are the benefits of eating fruit and vegetables?',
            'Do Thai people generally eat healthy food?',
            'Who does most of the cooking in your home?',
            'Did you learn to cook when you were younger?',
            'Should schools teach children how to cook?',
            'Do Thai people tend to cook at home or eat out?',
        ];
    }

    public static function topic5() {
        return [
            'What sorts of things do you buy most often?',
            'Do you compare prices before buying something?',
            'Is it possible to ask shop keepers to lower the price in your country?',
            'Does a high price always mean you’re getting high quality goods?',
            'Are there many street markets in your country?',
            'Tell me about your favourite street market.',
            'Are there any advantages of shopping in a street market?',
            'Why do some people prefer to shop in a department store rather than a street market?',
        ];
    }

    public static function topic6() {
        return [
            'What do people in Thailand generally do to relax?',
            'Is it important for people to take time to relax?',
            'Is there a difference between the way older people and younger people relax?',
            'Why do some people find it so difficult to take time to relax?',
            'Are there any parks or gardens near where you live?',
            'What do people in Thailand do when they go to a park?',
            'When was the last time you visited a park or garden?',
            'Is it important for cities to have parks and gardens?',
        ];
    }

    public static function topic7() {
        return [
            'When did you learn to use the internet?',
            'Which groups of people use the internet most in your country?',
            'What do people generally use the internet for in your country?',
            'Do you think you will spend more or less time on the internet in the future?',
            'Do you use many mobile apps?',
            'Which apps are most popular in your country?',
            'What do people generally use apps for in your <s>country</s> THAILAND?',
            'Would you like to create an app?',
        ];
    }

    public static function topic8() {
        return [
            'Tell me about a famous place you have visited in your country.',
            'Why do you think people like to visit famous places?',
            'Are there any disadvantages of living in a famous place?',
            'Is it important to take care of old buildings and historical sites?',
            'Where do Thai people like to <s>visit</s> GO for a holiday?',
            'When was the last time you went on holiday?',
            'Is it better to travel alone or with other people?',
            'What is the best holiday you have ever had?',
        ];
    }

    public static function topic9() {
        return [
            'Tell me about a job that you have done, or that you are doing?',
            'Do you work better in the morning, or in the afternoon?',
            'Is it better to work alone or as part of a team?',
            'What job would you like to do in the future?',
            'Do many families in Thailand have their own business?',
            'What kind of family businesses are most common here?',
            'Is it a good idea to work for the family business?',
            'Are there any disadvantages about working for the family business?',
        ];
    }

    public static function topic10() {
        return [
            'Tell me about a famous place you have visited in your country.',
            'Why do you think people like to visit famous places?',
            'Are there any disadvantages of living in a famous place?',
            'Is it important to take care of old buildings and historical sites?',
            'Where do Thai people like to GO for a holiday?',
            'When was the last time you went on holiday?',
            'Is it better to travel alone or with other people?',
            'What is the best holiday you have ever had?',
        ];
    }
}
